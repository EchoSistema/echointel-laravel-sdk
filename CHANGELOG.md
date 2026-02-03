# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.0] - 2026-02-02

### Breaking Changes

- **Endpoint URLs migrated from `snake_case` to `kebab-case`** to align with API v2.1
  - Example: `/api/forecast_revenue` → `/api/forecast-revenue`
  - All endpoint constants in `Endpoints.php` updated accordingly
  - SDK method names remain unchanged — no application code changes required
- **Base URL changed to production** (`https://ai.echosistema.live`)
  - Previously defaulted to `https://ai.echosistema.dev`
  - SDK now defaults to sandbox mode via `ECHOINTEL_SANDBOX` (default: `true`)

### Added

- **Sandbox mode toggle** via `ECHOINTEL_SANDBOX` environment variable
  - `true` (default): requests go to `https://ai.echosistema.dev`
  - `false`: requests go to `https://ai.echosistema.live`
  - Uses `filter_var` with `FILTER_VALIDATE_BOOLEAN` for reliable string-to-boolean conversion
- **`sandbox_api_url`** config key (`ECHOINTEL_SANDBOX_API_URL`) for overriding the sandbox URL
- **`Endpoints::SANDBOX_URL`** constant
- **Async ML Jobs** — methods for managing asynchronous machine learning jobs
  - `listJobs(?string $customerApiId, ?string $status, ?int $limit)` — List jobs with filtering
  - `getJobStatus(string $jobId)` — Poll job status and progress
  - `getJobResult(string $jobId)` — Retrieve completed job results
- **Dead Letter Queue (Admin)** — methods for managing failed job messages
  - `listDlqMessages(?string $queueName, ?int $limit)` — List failed job messages
  - `retryDlqMessage(string $jobId, ?string $queueName)` — Re-enqueue a failed job
  - `deleteDlqMessage(string $jobId, ?string $queueName)` — Remove a failed job message

### Changed

- `Endpoints::BASE_URL` updated from `https://ai.echosistema.dev` to `https://ai.echosistema.live`
- `config('echointel.api_url')` default updated to `https://ai.echosistema.live`
- `EchoIntelServiceProvider` now resolves `base_url` based on the `sandbox` config flag
- README rewritten for v2.0.0 with full API reference, migration guide, and sandbox documentation

### Removed

- `sanitizeTextEn()` endpoint removed from API (was never present in the Laravel SDK)

## [1.0.0] - 2025-12-25

### Added

- Initial release of EchoIntel Laravel SDK
- **EchoIntelClient** - Main client with 53 API methods
- **Facades** - `EchoIntel` facade for easy access
- **Helper** - Global `echointel()` helper function
- **RouteResolver** - Semantic route configuration with dot notation
- **Response Entities** - Typed response classes for all endpoints
  - Forecast (5 classes)
  - Inventory (4 classes)
  - Customer (16 classes)
  - Churn (1 class)
  - Propensity (1 class)
  - Recommendation (3 classes)
  - CrossSell (3 classes)
  - Pricing (2 classes)
  - Sentiment (4 classes)
  - Anomaly (5 classes)
  - CreditRisk (3 classes)
  - Attribution (5 classes)
  - Journey (4 classes)
  - Admin (1 class)
- **Exceptions** - Custom exception classes
  - `EchoIntelException` - Base exception
  - `EchoIntelValidationException` - HTTP 422 errors
  - `EchoIntelAuthenticationException` - HTTP 401/403 errors
- **Configuration** - Publishable config file
- **Auto-discovery** - Laravel package auto-discovery support

### API Endpoints

- **Forecasting**: revenue, cost, cost_improved, units, cost_totus
- **Inventory**: optimization, history_improved
- **Customer**: segmentation, features, loyalty, rfm, clv_features, clv_forecast
- **Churn**: risk, label
- **NPS**: calculate
- **Propensity**: buy_product, respond_campaign, upgrade_plan
- **Recommendations**: user_items, similar_items
- **Cross-Sell**: matrix, upsell
- **Pricing**: dynamic
- **Sentiment**: report, realtime
- **Anomaly**: transactions, accounts, graph
- **Credit Risk**: score, explain
- **Attribution**: channel, uplift
- **Journey**: markov, sequences
- **NLP**: analysis, analysis_en, excess_inventory, sanitize
- **Segmentation**: purchasing, dendrogram, hierarchy, subsegment, profiles
- **Reporting**: report, report_i18n, report_json
- **Admin**: customers (create, list, get, update, delete)
- **System**: health

[Unreleased]: https://github.com/EchoSistema/echointel-laravel-sdk/compare/v2.0.0...HEAD
[2.0.0]: https://github.com/EchoSistema/echointel-laravel-sdk/compare/v1.0.0...v2.0.0
[1.0.0]: https://github.com/EchoSistema/echointel-laravel-sdk/releases/tag/v1.0.0
