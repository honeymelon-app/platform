/**
 * Laravel API Resource Type Definitions
 * Generated from app/Http/Resources
 */

export interface ReleaseArtifact {
    id: string;
    platform: string;
    filename: string | null;
    size: number | null;
    source: string;
    download_url: string | null;
}

export interface Release {
    id: string;
    product_id: string | null;
    github_id: number | null;
    version: string;
    name: string | null;
    tag: string;
    commit_hash: string;
    author: string | null;
    html_url: string | null;
    target_commitish: string | null;
    channel: string;
    prerelease: boolean;
    draft: boolean;
    notes: string | null;
    published_at: string | null;
    github_created_at: string | null;
    is_downloadable: boolean;
    major: boolean;
    user_id: string | null;
    created_by: string | null; // alias for user_id in resources
    created_at: string;
    updated_at: string;
    artifacts_count?: number;
    artifacts?: ReleaseArtifact[];
}

export interface Artifact {
    id: string;
    github_id: number | null;
    release_id: string;
    platform: string;
    source: string;
    state: string | null;
    filename: string | null;
    content_type: string | null;
    size: number | null;
    download_count: number;
    sha256: string | null;
    signature: string | null;
    notarized: boolean;
    url: string | null;
    path: string | null;
    github_created_at: string | null;
    github_updated_at: string | null;
    created_at: string;
    updated_at: string;
    release?: Release;
    download_url?: string;
}

export interface Update {
    id: string;
    release_id: string;
    channel: string;
    version: string;
    is_latest: boolean;
    published_at: string | null;
    created_at: string;
}

export interface License {
    id: string;
    user_id: string | null;
    product_id: string | null;
    order_id: string;
    key: string; // key_plain in resource
    key_hash: string; // hashed key
    status: string;
    max_major_version: number;
    can_access_prereleases: boolean;
    meta: Record<string, any> | null;
    issued_at: string | null; // from meta
    activated_at: string | null;
    activation_count: number;
    device_id: string | null;
    is_activated: boolean;
    can_be_revoked: boolean;
    deleted_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Order {
    id: string;
    user_id: string | null;
    product_id: string | null;
    provider: string;
    external_id: string;
    email: string;
    amount_cents: number | null;
    formatted_amount: string;
    currency: string | null;
    meta: Record<string, any> | null;
    license_id: string | null;
    license?: License | null;
    refund_id: string | null;
    refunded_at: string | null;
    is_refunded: boolean;
    can_be_refunded: boolean;
    is_within_refund_window: boolean;
    deleted_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface WebhookEvent {
    id: string;
    provider: string;
    type: string;
    payload: Record<string, any>;
    processed_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Faq {
    id: number;
    question: string;
    answer: string;
    order: number;
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

export interface Product {
    id: string;
    name: string;
    slug: string;
    description: string | null;
    stripe_product_id: string | null;
    stripe_price_id: string | null;
    price_cents: number;
    currency: string;
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string | null;
    two_factor_confirmed_at: string | null;
    created_at: string;
    updated_at: string;
}

/**
 * Pagination metadata
 */
export interface PaginationMeta {
    current_page: number;
    from: number | null;
    last_page: number;
    per_page: number;
    to: number | null;
    total: number;
}

/**
 * Pagination links
 */
export interface PaginationLinks {
    first: string | null;
    last: string | null;
    prev: string | null;
    next: string | null;
}

/**
 * Paginated response wrapper
 */
export interface PaginatedResponse<T> {
    data: T[];
    meta: PaginationMeta;
    links: PaginationLinks;
}

/**
 * Tauri Update Manifest (raw format - NO envelope)
 */
export interface UpdateManifest {
    version: string;
    notes: string;
    pub_date: string;
    platforms: {
        [platform: string]: {
            signature: string;
            url: string;
            sha256: string;
        };
    };
}
