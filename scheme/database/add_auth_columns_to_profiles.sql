-- Migration: add_auth_columns_to_profiles.sql
-- Adds email, password and created_at columns to existing profiles table
-- Run this against your MySQL database (replace 'payrolldb' and connection details as needed)

ALTER TABLE profiles
  ADD COLUMN email VARCHAR(255) UNIQUE AFTER last_name,
  ADD COLUMN password VARCHAR(255) AFTER email,
  ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP AFTER password;

-- If your profiles table uses different column names (e.g., name instead of first_name/last_name), adjust accordingly.
