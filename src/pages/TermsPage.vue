<script setup lang="ts">
import ContentSection from '@/components/marketing/ContentSection.vue';
import Separator from '@/components/ui/separator/Separator.vue';
</script>

<template>
    <ContentSection title="Terms of Use" subtitle="Last updated: February 2026">
        <div
            class="rounded-3xl border border-border bg-background p-8 sm:p-10"
        >
            <div
                class="prose max-w-none space-y-8 prose-slate dark:prose-invert"
            >
                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Agreement to Terms
                    </h2>
                    <p
                        class="text-base leading-relaxed text-muted-foreground"
                    >
                        By downloading, installing, or using Honeymelon, you
                        agree to be bound by these Terms of Use and the GNU
                        General Public License v3 (GPLv3) under which
                        Honeymelon is distributed. If you do not agree to
                        these terms, do not use the software.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        License
                    </h2>
                    <p
                        class="mb-4 text-base leading-relaxed text-muted-foreground"
                    >
                        Honeymelon is free and open source software,
                        distributed under the
                        <a
                            href="https://www.gnu.org/licenses/gpl-3.0.html"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GNU General Public License v3 (GPLv3)</a
                        >. Under this license, you are free to:
                    </p>
                    <ul class="space-y-2 text-base text-muted-foreground">
                        <li>
                            <strong>Use</strong> Honeymelon for any purpose,
                            personal or commercial
                        </li>
                        <li>
                            <strong>Study</strong> how the software works by
                            examining the source code
                        </li>
                        <li>
                            <strong>Modify</strong> the software to suit your
                            needs
                        </li>
                        <li>
                            <strong>Distribute</strong> copies of the original
                            or your modified version
                        </li>
                    </ul>
                    <p
                        class="mt-4 text-base leading-relaxed text-muted-foreground"
                    >
                        If you distribute modified versions of Honeymelon, you
                        must do so under the same GPLv3 license and make your
                        source code available.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
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
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Open Source Components
                    </h2>
                    <p
                        class="mb-4 text-base leading-relaxed text-muted-foreground"
                    >
                        Honeymelon incorporates the following open source
                        components, each under their respective licenses:
                    </p>
                    <ul class="space-y-2 text-base text-muted-foreground">
                        <li>
                            <strong>FFmpeg</strong> — licensed under the LGPL
                            (Lesser General Public License). Source code and
                            license information at
                            <a
                                href="https://ffmpeg.org"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="font-medium text-primary hover:underline"
                                >ffmpeg.org</a
                            >.
                        </li>
                        <li>
                            <strong>Tauri</strong> — licensed under MIT and
                            Apache 2.0. See
                            <a
                                href="https://github.com/tauri-apps/tauri"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="font-medium text-primary hover:underline"
                                >github.com/tauri-apps/tauri</a
                            >.
                        </li>
                    </ul>
                    <p
                        class="mt-4 text-base leading-relaxed text-muted-foreground"
                    >
                        A complete list of third-party dependencies and their
                        licenses can be found in the
                        <a
                            href="https://github.com/honeymelon-app/honeymelon/blob/main/THIRD_PARTY_NOTICES.md"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >THIRD_PARTY_NOTICES.md</a
                        >
                        file in the repository.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Trademarks
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        The name "Honeymelon", the Honeymelon logo, and
                        associated branding are trademarks of the project
                        maintainer and are not covered by the GPLv3 license.
                        While you are free to fork, modify, and distribute the
                        source code under GPLv3, you may not use the
                        Honeymelon name, logo, or branding in a way that
                        suggests your modified version is the official
                        Honeymelon software or is endorsed by the project
                        maintainer. Forks and derivative works should use
                        their own distinct name and branding.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Content Responsibility
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        You are solely responsible for the media files you
                        convert using Honeymelon. You must ensure you have the
                        legal right to convert, modify, and distribute any
                        content you process. We do not monitor, review, or
                        have access to the content you convert.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Contributions
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        Contributions to Honeymelon are welcome and governed
                        by our
                        <a
                            href="https://github.com/honeymelon-app/honeymelon/blob/main/CONTRIBUTING.md"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >Contributing Guide</a
                        >. By submitting a pull request or other contribution,
                        you agree that your contribution will be licensed under
                        the same GPLv3 license as the rest of the project.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Warranty Disclaimer
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        HONEYMELON IS PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
                        KIND. WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED,
                        INCLUDING BUT NOT LIMITED TO WARRANTIES OF
                        MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND
                        NON-INFRINGEMENT. WE DO NOT WARRANT THAT THE SOFTWARE
                        WILL BE ERROR-FREE OR UNINTERRUPTED.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Limitation of Liability
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE SHALL NOT
                        BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL,
                        CONSEQUENTIAL, OR PUNITIVE DAMAGES, OR ANY LOSS OF
                        PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR
                        INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR
                        OTHER INTANGIBLE LOSSES RESULTING FROM YOUR USE OF
                        HONEYMELON.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Updates and Support
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        We may release updates, bug fixes, and new versions of
                        Honeymelon. Updates are provided free of charge. We
                        reserve the right to discontinue support for older
                        versions. Community support is available via
                        <a
                            href="https://github.com/orgs/honeymelon-app/discussions"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub Discussions</a
                        >
                        and
                        <a
                            href="https://github.com/honeymelon-app/honeymelon/issues"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub Issues</a
                        >.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Changes to Terms
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        We reserve the right to modify these terms at any
                        time. Changes will be published to our
                        <a
                            href="https://github.com/honeymelon-app/honeymelon"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="font-medium text-primary hover:underline"
                            >GitHub repository</a
                        >
                        and reflected on this page. Continued use of
                        Honeymelon after changes constitutes acceptance of the
                        new terms.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Governing Law
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        These terms are governed by the laws of the
                        jurisdiction in which the project maintainer resides,
                        without regard to conflict of law principles. Any
                        disputes shall be resolved in the courts of that
                        jurisdiction.
                    </p>
                </section>

                <Separator />

                <section>
                    <h2 class="mb-4 text-2xl font-bold text-foreground">
                        Contact Us
                    </h2>
                    <p class="text-base leading-relaxed text-muted-foreground">
                        If you have questions about these terms, please
                        contact us at
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
