/**
 * GoatCounter Analytics custom event tracking.
 *
 * GoatCounter is loaded via a <script> tag in index.html.
 * This module provides a typed wrapper around the global `goatcounter.count()`
 * function and gracefully no-ops when the script isn't loaded (e.g. blocked by
 * an ad-blocker or running in development).
 *
 * @see https://www.goatcounter.com/help/events
 */

declare global {
    interface Window {
        goatcounter?: {
            count: (vars: {
                path: string
                title?: string
                event?: boolean
            }) => void
        }
    }
}

export type AnalyticsEvent =
    | 'Download'
    | 'Star on GitHub'
    | 'Visit GitHub'
    | 'View Release'

/**
 * Track a custom event in GoatCounter.
 *
 * Events appear in the dashboard as virtual page-views prefixed with
 * "events/" so they're easy to filter.
 */
export function trackEvent(
    event: AnalyticsEvent,
    props?: Record<string, string | number | boolean>,
): void {
    if (typeof window !== 'undefined' && window.goatcounter?.count) {
        const title = props
            ? `${event} (${Object.entries(props).map(([k, v]) => `${k}=${v}`).join(', ')})`
            : event

        window.goatcounter.count({
            path: `events/${event.toLowerCase().replace(/\s+/g, '-')}`,
            title,
            event: true,
        })
    }
}
