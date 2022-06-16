import ast, operator
import logging
logger = logging.getLogger('__file__')
def safe_eval(s):

    def checkmath(x, *args):
        if x not in [x for x in dir(math) if not "__" in x]:
            raise SyntaxError(f"Unknown func {x}()")
        fun = getattr(math, x)
        return fun(*args)

    binOps = {
        ast.Add: operator.add,
        ast.Sub: operator.sub,
        ast.Mult: operator.mul,
        ast.Div: operator.truediv,
        ast.Mod: operator.mod,
        ast.Pow: operator.pow,
        ast.Call: checkmath,
        ast.BinOp: ast.BinOp,
    }

    unOps = {
        ast.USub: operator.neg,
        ast.UAdd: operator.pos,
        ast.UnaryOp: ast.UnaryOp,
    }

    ops = tuple(binOps) + tuple(unOps)

    tree = ast.parse(s, mode='eval')

    def _eval(node):
        if isinstance(node, ast.Expression):
            logger.debug("Expr")
            return _eval(node.body)
        elif isinstance(node, ast.Str):
            logger.debug("Str")
            return node.s
        elif isinstance(node, ast.Num):
            logger.debug("Num")
            return node.value
        elif isinstance(node, ast.Constant):
            logger.info("Const")
            return node.value
        elif isinstance(node, ast.BinOp):
            logger.debug("BinOp")
            if isinstance(node.left, ops):
                left = _eval(node.left)
            else:
                left = node.left.value
            if isinstance(node.right, ops):
                right = _eval(node.right)
            else:
                right = node.right.value
            return binOps[type(node.op)](left, right)
        elif isinstance(node, ast.UnaryOp):
            logger.debug("UpOp")
            if isinstance(node.operand, ops):
                operand = _eval(node.operand)
            else:
                operand = node.operand.value
            return unOps[type(node.op)](operand)
        elif isinstance(node, ast.Call):
            args = [_eval(x) for x in node.args]
            r = checkmath(node.func.id, *args)
            return r
        else:
            raise SyntaxError(f"Bad syntax, {type(node)}")

    return _eval(tree)