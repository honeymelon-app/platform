<script setup lang="ts">
import ContentSection from '@/components/marketing/ContentSection.vue';
import Card from '@/components/ui/card/Card.vue';
import CardContent from '@/components/ui/card/CardContent.vue';
import Separator from '@/components/ui/separator/Separator.vue';
import { useSeoMeta } from '@/composables';
import MarketingLayout from '@/layouts/MarketingLayout.vue';
import { Head } from '@inertiajs/vue3';

const { headTags } = useSeoMeta({
    title: 'Terms of Use - Honeymelon',
    description:
        'Terms of use for Honeymelon macOS media converter. Open-source, free to use, and community maintained.',
    canonical: '/terms',
    ogType: 'article',
});
</script>

<template>
    <Head>
        <title>{{ headTags.title }}</title>
        <meta name="description" :content="headTags.description" />
        <link rel="canonical" :href="headTags.canonical" />
        <meta name="robots" :content="headTags.robots" />
        <meta property="og:title" :content="headTags.ogTitle" />
        <meta property="og:description" :content="headTags.ogDescription" />
        <meta property="og:image" :content="headTags.ogImage" />
        <meta property="og:url" :content="headTags.ogUrl" />
        <meta property="og:type" :content="headTags.ogType" />
        <meta property="og:site_name" :content="headTags.ogSiteName" />
        <meta name="twitter:card" :content="headTags.twitterCard" />
        <meta name="twitter:title" :content="headTags.twitterTitle" />
        <meta
            name="twitter:description"
            :content="headTags.twitterDescription"
        />
        <meta name="twitter:image" :content="headTags.twitterImage" />
    </Head>

    <MarketingLayout>
        <ContentSection
            title="Terms of Use"
            subtitle="Last updated: February 2026"
        >
            <Card>
                <CardContent
                    class="prose max-w-none space-y-8 py-8 prose-slate dark:prose-invert"
                >
                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Agreement to Terms
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            By downloading, installing, or using Honeymelon, you
                            agree to be bound by these Terms of Use. If you do
                            not agree to these terms, do not use the software.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Open Source License
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon is distributed as open-source software.
                            Your use of the app and the source code is governed
                            by the applicable open-source license published in
                            the GitHub repository. The license terms grant you
                            the rights to use, modify, and distribute the
                            software according to that license.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Pricing</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon is free to download and use. There are no
                            subscriptions, license keys, or payments required to
                            access the full feature set.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Activation</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon does not require license activation. The
                            app works fully offline with no activation checks or
                            recurring network requirements.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Acceptable Use</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            You agree to use Honeymelon responsibly and in
                            compliance with applicable laws. You are solely
                            responsible for ensuring you have the rights to
                            process any content you convert.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            System Requirements
                        </h2>
                        <p
                            class="mb-4 text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon requires:
                        </p>
                        <ul class="space-y-2 text-base text-muted-foreground">
                            <li>macOS 13 (Ventura) or later</li>
                            <li>Apple Silicon (M1, M2, M3, M4, or later)</li>
                            <li>At least 50 MB of available disk space</li>
                        </ul>
                        <p
                            class="mt-4 text-base leading-relaxed text-muted-foreground"
                        >
                            Intel-based Macs are not supported. We are not
                            responsible if the software does not function on
                            unsupported systems.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Open Source Components
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon uses FFmpeg, which is licensed under the
                            LGPL (Lesser General Public License). The use of
                            FFmpeg does not affect your rights to use Honeymelon
                            as described in these terms. FFmpeg source code and
                            license information can be found at ffmpeg.org.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Content Responsibility
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            You are solely responsible for the media files you
                            convert using Honeymelon. You must ensure you have
                            the legal right to convert, modify, and distribute
                            any content you process. We do not monitor, review,
                            or have access to the content you convert.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Payments</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon does not process payments or sell
                            licenses. If we offer optional services in the
                            future, they will be described separately.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Warranty Disclaimer
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            HONEYMELON IS PROVIDED "AS IS" WITHOUT WARRANTY OF
                            ANY KIND. WE DISCLAIM ALL WARRANTIES, EXPRESS OR
                            IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF
                            MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE,
                            AND NON-INFRINGEMENT. WE DO NOT WARRANT THAT THE
                            SOFTWARE WILL BE ERROR-FREE OR UNINTERRUPTED.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Limitation of Liability
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE SHALL NOT
                            BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL,
                            CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS OF
                            PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR
                            INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR
                            OTHER INTANGIBLE LOSSES RESULTING FROM YOUR USE OF
                            HONEYMELON. OUR TOTAL LIABILITY SHALL NOT EXCEED THE
                            AMOUNT YOU PAID FOR OPTIONAL SERVICES, IF ANY.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Updates and Support
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Updates are released publicly through the open
                            source repository. Support is provided through
                            community channels and documentation on a best-effort
                            basis.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Termination</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            We may restrict access to hosted services if you
                            violate these terms. Open-source license rights are
                            governed by the applicable license.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Changes to Terms
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            We may update these terms as the project evolves.
                            Material changes will be posted on this page and in
                            the open-source repository.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Governing Law</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            These terms are governed by the laws of the
                            jurisdiction in which our company is registered,
                            without regard to conflict of law principles. Any
                            disputes shall be resolved in the courts of that
                            jurisdiction.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Contact Us</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            If you have questions about these terms, please
                            contact us at legal@honeymelon.app.
                        </p>
                    </section>
                </CardContent>
            </Card>
        </ContentSection>
    </MarketingLayout>
</template>
