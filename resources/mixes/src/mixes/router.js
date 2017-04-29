import Sitemap from '../pages/Sitemap.vue';

export default function (injection) {
    injection.useExtensionRoute([
        {
            beforeEnter: injection.middleware.requireAuth,
            component: Sitemap,
            path: 'sitemap',
        },
    ]);
}