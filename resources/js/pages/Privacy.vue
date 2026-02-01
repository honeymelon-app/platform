<script setup lang="ts">
import ContentSection from '@/components/marketing/ContentSection.vue';
import Card from '@/components/ui/card/Card.vue';
import CardContent from '@/components/ui/card/CardContent.vue';
import Separator from '@/components/ui/separator/Separator.vue';
import { useSeoMeta } from '@/composables';
import MarketingLayout from '@/layouts/MarketingLayout.vue';
import { Head } from '@inertiajs/vue3';

const { headTags } = useSeoMeta({
    title: 'Privacy Policy - Honeymelon',
    description:
        'Privacy policy for Honeymelon macOS media converter. Open-source app with zero telemetry or usage data. Your files never leave your device.',
    canonical: '/privacy',
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
            title="Privacy Policy"
            subtitle="Last updated: February 2026"
        >
            <Card>
                <CardContent
                    class="prose max-w-none space-y-8 py-8 prose-slate dark:prose-invert"
                >
                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Our Commitment to Privacy
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon is built with privacy as a core
                            principle. We believe your media files and
                            conversion activities are your business, not ours.
                            This privacy policy explains how we handle (or
                            rather, don't handle) your data.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Data We Don't Collect
                        </h2>
                        <p
                            class="mb-4 text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon operates entirely offline on your Mac. We
                            do not collect, transmit, or store:
                        </p>
                        <ul class="space-y-2 text-base text-muted-foreground">
                            <li>Your media files or their contents</li>
                            <li>File names, paths, or metadata</li>
                            <li>Conversion settings or preferences</li>
                            <li>Usage analytics or telemetry data</li>
                            <li>Crash reports or diagnostic information</li>
                            <li>Any personally identifiable information</li>
                        </ul>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            How Honeymelon Works
                        </h2>
                        <p
                            class="mb-4 text-base leading-relaxed text-muted-foreground"
                        >
                            All media conversion happens locally on your Mac
                            using your device's hardware. Your files never leave
                            your device, and no media data is ever transmitted.
                        </p>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon does not require license activation or
                            recurring network calls. All processing happens
                            locally on your device.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Third-Party Services
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            We do not use third-party payment processors for the
                            core app. If optional services are offered in the
                            future, we will update this section accordingly.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Cookies</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Our website uses minimal essential cookies for
                            authentication and session management if you log in
                            to manage the admin dashboard. We do not use
                            tracking cookies or third-party advertising cookies.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Data Security</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Since Honeymelon processes all media locally on your
                            device and doesn't transmit your files, the security
                            of your media files is entirely under your control.
                            We recommend following standard macOS security best
                            practices to protect your data.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Your Rights</h2>
                        <p
                            class="mb-4 text-base leading-relaxed text-muted-foreground"
                        >
                            Since we collect minimal data, your rights are
                            straightforward:
                        </p>
                        <ul class="space-y-2 text-base text-muted-foreground">
                            <li>
                                <strong>Access:</strong> Contact us to request
                                any data we have about you in the admin system
                            </li>
                            <li>
                                <strong>Deletion:</strong> Request deletion of
                                your account data at any time
                            </li>
                            <li>
                                <strong>Portability:</strong> Request export of
                                any personal data we store
                            </li>
                        </ul>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Children's Privacy
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            Honeymelon is not directed at children under 13. We
                            do not knowingly collect personal information from
                            children. If you believe a child has provided us
                            with personal information, please contact us.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">
                            Changes to This Policy
                        </h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            We may update this privacy policy from time to time.
                            We will notify users of any material changes by
                            updating the "Last updated" date at the top of this
                            policy and, for admin users, via email when needed.
                        </p>
                    </section>

                    <Separator />

                    <section>
                        <h2 class="mb-4 text-2xl font-bold">Contact Us</h2>
                        <p
                            class="text-base leading-relaxed text-muted-foreground"
                        >
                            If you have questions about this privacy policy or
                            our privacy practices, please contact us at
                            legal@honeymelon.app.
                        </p>
                    </section>
                </CardContent>
            </Card>
        </ContentSection>
    </MarketingLayout>
</template>
