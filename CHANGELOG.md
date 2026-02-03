# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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

[Unreleased]: https://github.com/EchoSistema/echointel-laravel-sdk/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/EchoSistema/echointel-laravel-sdk/releases/tag/v1.0.0
