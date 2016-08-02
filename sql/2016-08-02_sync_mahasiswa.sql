ALTER TABLE `mahasiswa` ADD `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_at`, ADD `synced_at` TIMESTAMP NULL AFTER `updated_at`;
UPDATE `mahasiswa` SET `updated_at` = `created_at`;
UPDATE `mahasiswa` SET `synced_at` = `created_at`;

CREATE TABLE `sync_session` (
  `id` varchar(32) NOT NULL PRIMARY KEY,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp
);
