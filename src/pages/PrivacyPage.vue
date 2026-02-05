<script setup lang="ts">
import ContentSection from '@/components/marketing/ContentSection.vue';
import Separator from '@/components/ui/separator/Separator.vue';
</script>

<template>
    <ContentSection title="Privacy Policy" subtitle="Last updated: February 2026">
        <div
            class="rounded-3xl border border-border bg-background p-8 sm:p-10"
        >
            <div
                class="prose max-w-none space-y-8 prose-slate dark:prose-invert"
            >
                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Our Commitment to Privacy
                    </h2>
                    <p
                        class="text-base leading-relaxed text-muted-foreground"
                    >
                        Honeymelon is built with privacy as a core principle.
                        We believe your media files and conversion activities
                        are your business, not ours. This privacy policy
                        explains how we handle (or rather, don't handle) your
                        data.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
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
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        How Honeymelon Works
                    </h2>
                    <p
                        class="mb-4 text-base leading-relaxed text-muted-foreground"
                    >
                        All media conversion happens locally on your Mac using
                        your device's hardware. Your files never leave your
                        device, and no media data is ever transmitted over the
                        network.
                    </p>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        <strong>Fully Offline:</strong> Honeymelon does not
                        require an internet connection to function. There are
                        no license activations, no telemetry calls, and no
                        network communication of any kind during normal use.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Open Source Transparency
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        Honeymelon is free and open source software, licensed
                        under the GNU General Public License v3 (GPLv3). You
                        can inspect the complete source code on
                        <a
                            href="https://github.com/honeymelon-app/honeymelon"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub</a
                        >
                        to verify our privacy claims for yourself.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Website Analytics
                    </h2>
                    <p
                        class="mb-4 text-base leading-relaxed text-muted-foreground"
                    >
                        This website uses
                        <a
                            href="https://www.goatcounter.com"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GoatCounter</a
                        >, a privacy-friendly, open source analytics tool.
                        GoatCounter does not use cookies, does not collect
                        personal data, and is fully compliant with GDPR,
                        CCPA, and PECR. All data is aggregated and no
                        individual visitors can be identified.
                    </p>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        This website also makes requests to the
                        <a
                            href="https://docs.github.com/en/rest"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub public API</a
                        >
                        to display star counts and download information from
                        our repository. These requests are made from your
                        browser directly to GitHub's servers and are subject
                        to
                        <a
                            href="https://docs.github.com/en/site-policy/privacy-policies/github-general-privacy-statement"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub's Privacy Statement</a
                        >. We do not proxy, log, or store any data from these
                        requests.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Cookies
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        This website does not use cookies. We do not use
                        tracking cookies, advertising cookies, or any
                        third-party cookies.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Data Security
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        Since Honeymelon processes all media locally on your
                        device and doesn't transmit your files, the security
                        of your media files is entirely under your control. We
                        recommend following standard macOS security best
                        practices to protect your data.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Children's Privacy
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        Honeymelon is not directed at children under 13.
                        Because we do not collect any personal information
                        from any user, there is no risk of children's data
                        being gathered or stored. If you have any concerns,
                        please contact us.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Changes to This Policy
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        We may update this privacy policy from time to time.
                        Changes will be reflected by updating the "Last
                        updated" date at the top of this policy and published
                        to our
                        <a
                            href="https://github.com/honeymelon-app/honeymelon"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub repository</a
                        >.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Contact Us
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        If you have questions about this privacy policy or our
                        privacy practices, please contact us at
                        <a
                            href="mailto:legal@honeymelon.app"
                            class="font-medium text-primary hover:underline"
                            >legal@honeymelon.app</a
                        >
                        or open an issue on
                        <a
                            href="https://github.com/honeymelon-app/honeymelon/issues"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub</a
                        >.
                    </p>
                </section>
            </div>
        </div>
    </ContentSection>
</template>
