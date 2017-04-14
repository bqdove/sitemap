
export default function (injection) {
    injection.useExtensionRoute([
        {
            beforeEnter: injection.middleware.requireAuth,
            component: null,
            path: 'sitemap',
        },
    ]);
}
