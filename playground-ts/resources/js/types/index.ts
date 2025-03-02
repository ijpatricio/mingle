export interface Auth {
    user: User
}

export interface User {
    id: number
    name: string
    email: string
    avatar?: string
    email_verified_at: string | null
    created_at: string
    updated_at: string
    // This allows for additional properties...
    [key: string]: unknown
}
