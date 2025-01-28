import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/admin/app.scss',
                'resources/js/app.js',
                'resources/js/components/carousel.js',
                'resources/js/components/rating.js',
                'resources/js/components/reviewsForm.js',
                'resources/js/components/sendEmail.js',
                'resources/js/components/updateReviewForm.js',
                'resources/js/components/veterinarianReportForm.js',
            ],
            refresh: true,
        }),
    ],
});
