import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    activeIcon?: LucideIcon;
    isActive?: boolean;
    items?: {
        title: string;
        url: string;
    }[];
}

export interface NavProjectItem {
    title: string;
    href: string;
    count?: number;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Group {
    id: number;
    name: string;
    description: string;
    owner_id: number;
    owner: User;
    members: User[];
    created_at: string;
    updated_at: string;
}

export interface Project {
    id: number;
    name: string;
    description?: string;
    owner_id: number;
    owner: User;
    users: User[];
    created_at: string;
    updated_at: string;
}

export interface Task {
    id: number;
    title: string;
    description?: string;
    project_id: number;
    project: Project;
    starting_date: string;
    ending_date: string;
    status: 'pending' | 'in_progress' | 'completed' | 'archived';
    assignedTo: User[];
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
