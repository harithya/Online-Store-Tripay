const Ziggy = {
    url: 'http:\/\/localhost:8000',
    port: 8000,
    defaults: {},
    routes: {
        'sanctum.csrf-cookie': { uri: 'sanctum\/csrf-cookie', methods: ['GET', 'HEAD'] },
        'home.index': { uri: '\/', methods: ['GET', 'HEAD'] },
        'home.show': { uri: 'product\/{slug}', methods: ['GET', 'HEAD'], parameters: ['slug'] },
        'cart.index': { uri: 'cart', methods: ['GET', 'HEAD'] },
        'cart.store': { uri: 'cart', methods: ['POST'] },
        'cart.destroy': { uri: 'cart\/{cart}', methods: ['DELETE'], parameters: ['cart'] },
        'checkout.store': { uri: 'checkout', methods: ['POST'] },
        'transaction.index': { uri: 'transaction', methods: ['GET', 'HEAD'] },
        'transaction.show': { uri: 'transaction\/{transaction}', methods: ['GET', 'HEAD'], parameters: ['transaction'] },
        'auth.login.index': { uri: 'auth\/login', methods: ['GET', 'HEAD'] },
        'auth.login.store': { uri: 'auth\/login', methods: ['POST'] },
        'auth.register.index': { uri: 'auth\/register', methods: ['GET', 'HEAD'] },
        'auth.register.store': { uri: 'auth\/register', methods: ['POST'] },
        'auth.logout': { uri: 'auth\/logout', methods: ['POST'] },
        'admin.dashboard.index': { uri: 'admin\/dashboard', methods: ['GET', 'HEAD'] },
        'admin.product.index': { uri: 'admin\/product', methods: ['GET', 'HEAD'] },
        'admin.product.create': { uri: 'admin\/product\/create', methods: ['GET', 'HEAD'] },
        'admin.product.store': { uri: 'admin\/product', methods: ['POST'] },
        'admin.product.show': { uri: 'admin\/product\/{product}', methods: ['GET', 'HEAD'], parameters: ['product'] },
        'admin.product.edit': { uri: 'admin\/product\/{product}\/edit', methods: ['GET', 'HEAD'], parameters: ['product'] },
        'admin.product.update': { uri: 'admin\/product\/{product}', methods: ['PUT', 'PATCH'], parameters: ['product'] },
        'admin.product.destroy': { uri: 'admin\/product\/{product}', methods: ['DELETE'], parameters: ['product'] },
        'admin.invoice.index': { uri: 'admin\/invoice', methods: ['GET', 'HEAD'] },
        'admin.invoice.show': { uri: 'admin\/invoice\/{invoice}', methods: ['GET', 'HEAD'], parameters: ['invoice'] },
        'storage.local': { uri: 'storage\/{path}', methods: ['GET', 'HEAD'], wheres: { path: '.*' }, parameters: ['path'] },
    },
};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
