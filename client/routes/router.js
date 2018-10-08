// PRODUCTS ROUTES //
const Product = () =
>
import
('~/pages/product').then(m = > m.default || m
)


const routes = [
    {path: '/products', name: 'products', component: Product},
]


export function createRouter() {
    return new Router({
        routes,
        mode: 'history'
    })
}
