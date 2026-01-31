export * from './auth';
export * from './navigation';
export * from './ui';

import type { Auth } from './auth';

export type AppPageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    name: string;
    auth: Auth;
    sidebarOpen: boolean;
    [key: string]: unknown;
};

export type Office = {
    id: number;
    name: string;
    owner_id: number;
};

export type OfficeInvitation = {
    id: number;
    email: string;
    office_id: number;
    role: string;
    token: string;
    accepted_at: string | null;
    expires_at: string | null;
};
