# EchoIntel Laravel SDK

[![Packagist Version](https://img.shields.io/packagist/v/echointel/laravel-sdk)](https://packagist.org/packages/echointel/laravel-sdk)
[![Packagist Downloads](https://img.shields.io/packagist/dt/echointel/laravel-sdk)](https://packagist.org/packages/echointel/laravel-sdk)
[![PHP Version](https://img.shields.io/packagist/php-v/echointel/laravel-sdk)](https://packagist.org/packages/echointel/laravel-sdk)
[![Laravel Version](https://img.shields.io/badge/Laravel-10.x%20|%2011.x%20|%2012.x-red)](https://laravel.com)
[![License](https://img.shields.io/badge/License-Proprietary-blue)](LICENSE)

Laravel SDK for the EchoIntel AI API -- forecasting, customer segmentation, inventory optimization, anomaly detection, credit risk, NLP, and more.

**Packagist:** https://packagist.org/packages/echointel/laravel-sdk

## Requirements

- PHP 8.1+
- Laravel 10.x, 11.x, or 12.x
- Composer

## Installation

```bash
composer require echointel/laravel-sdk
```

The service provider and facade are registered automatically via Laravel auto-discovery.

### Publish Configuration

```bash
php artisan vendor:publish --tag=echointel-config
```

### Environment Variables

Add the following to your `.env` file:

```env
ECHOINTEL_CUSTOMER_API_ID=your-customer-api-id
ECHOINTEL_SECRET=your-secret-key
```

#### Sandbox / Production

The SDK defaults to **sandbox mode** when `ECHOINTEL_SANDBOX` is absent.

```env
# Sandbox (default) - https://ai.echosistema.dev
ECHOINTEL_SANDBOX=true

# Production - https://ai.echosistema.live
ECHOINTEL_SANDBOX=false
```

You can also override the URLs directly:

```env
ECHOINTEL_API_URL=https://ai.echosistema.live
ECHOINTEL_SANDBOX_API_URL=https://ai.echosistema.dev
```

#### Optional

```env
ECHOINTEL_ADMIN_SECRET=your-admin-secret
ECHOINTEL_TIMEOUT=30
```

## Quick Start

### Using the Facade

```php
use EchoIntel\Facades\EchoIntel;

// Health check
$health = EchoIntel::health();

// Forecast revenue
$result = EchoIntel::forecastRevenue([
    'forecast_period' => 12,
    'data' => [
        ['date' => '2024-01-01', 'revenue' => 10000],
        ['date' => '2024-02-01', 'revenue' => 12000],
    ],
]);

// Customer segmentation
$segments = EchoIntel::customerSegmentation([
    'data' => $customerRecords,
    'max_clusters' => 5,
]);
```

### Using Dependency Injection

```php
use EchoIntel\EchoIntelClient;

class ForecastController extends Controller
{
    public function __construct(
        private EchoIntelClient $echointel
    ) {}

    public function revenue(Request $request)
    {
        $result = $this->echointel->forecastRevenue([
            'forecast_period' => $request->period,
            'data' => $request->data,
        ]);

        return response()->json($result);
    }
}
```

### Using the Helper

```php
$result = echointel()->forecastRevenue($data);
```

## Available Methods

### System

| Method | Endpoint |
|--------|----------|
| `health()` | `GET /health` |

### Forecasting

| Method | Endpoint |
|--------|----------|
| `forecastRevenue(array $data)` | `POST /api/forecast-revenue` |
| `forecastCost(array $data)` | `POST /api/forecast-cost` |
| `forecastCostImproved(array $data)` | `POST /api/forecast-cost-improved` |
| `forecastUnits(array $data)` | `POST /api/forecast-units` |
| `forecastCostTotus(array $data)` | `POST /api/forecast-cost-totus` |

### Inventory

| Method | Endpoint |
|--------|----------|
| `inventoryOptimization(array $data)` | `POST /api/inventory-optimization` |
| `inventoryHistoryImproved(array $data)` | `POST /api/inventory-history-improved` |

### Customer Analytics

| Method | Endpoint |
|--------|----------|
| `customerSegmentation(array $data)` | `POST /api/customer-segmentation` |
| `customerFeatures(array $data)` | `POST /api/customer-features` |
| `customerLoyalty(array $data)` | `POST /api/customer-loyalty` |
| `customerRfm(array $data)` | `POST /api/customer-rfm` |
| `customerClvFeatures(array $data)` | `POST /api/customer-clv-features` |
| `customerClvForecast(array $data)` | `POST /api/customer-clv-forecast` |

### Churn Analysis

| Method | Endpoint |
|--------|----------|
| `churnRisk(array $data)` | `POST /api/churn-risk` |
| `churnLabel(array $data)` | `POST /api/churn-label` |

### NPS

| Method | Endpoint |
|--------|----------|
| `nps(array $data)` | `POST /api/nps` |

### Propensity Modeling

| Method | Endpoint |
|--------|----------|
| `propensityBuyProduct(array $data)` | `POST /api/propensity-buy-product` |
| `propensityRespondCampaign(array $data)` | `POST /api/propensity-respond-campaign` |
| `propensityUpgradePlan(array $data)` | `POST /api/propensity-upgrade-plan` |

### Recommendations

| Method | Endpoint |
|--------|----------|
| `recommendUserItems(array $data)` | `POST /api/recommend-user-items` |
| `recommendSimilarItems(array $data)` | `POST /api/recommend-similar-items` |

### Cross-Sell & Upsell

| Method | Endpoint |
|--------|----------|
| `crossSellMatrix(array $data)` | `POST /api/cross-sell-matrix` |
| `upsellSuggestions(array $data)` | `POST /api/upsell-suggestions` |

### Dynamic Pricing

| Method | Endpoint |
|--------|----------|
| `dynamicPricingRecommend(array $data)` | `POST /api/dynamic-pricing-recommend` |

### Sentiment Analysis

| Method | Endpoint |
|--------|----------|
| `sentimentReport(array $data)` | `POST /api/sentiment-report` |
| `sentimentRealtime(array $data)` | `POST /api/sentiment-realtime` |

### Anomaly Detection

| Method | Endpoint |
|--------|----------|
| `anomalyTransactions(array $data)` | `POST /api/anomaly-transactions` |
| `anomalyAccounts(array $data)` | `POST /api/anomaly-accounts` |
| `anomalyGraph(array $data)` | `POST /api/anomaly-graph` |

### Credit Risk

| Method | Endpoint |
|--------|----------|
| `creditRiskScore(array $data)` | `POST /api/credit-risk-score` |
| `creditRiskExplain(array $data)` | `POST /api/credit-risk-explain` |

### Marketing Attribution

| Method | Endpoint |
|--------|----------|
| `channelAttribution(array $data)` | `POST /api/channel-attribution` |
| `upliftModel(array $data)` | `POST /api/uplift-model` |

### Customer Journey

| Method | Endpoint |
|--------|----------|
| `journeyMarkov(array $data)` | `POST /api/journey-markov` |
| `journeySequences(array $data)` | `POST /api/journey-sequences` |

### NLP & Text Processing

| Method | Endpoint |
|--------|----------|
| `nlpAnalysis(array $data)` | `POST /api/nlp-analisys` |
| `nlpAnalysisEn(array $data)` | `POST /api/nlp-analisys-en` |
| `nlpExcessInventoryReport(array $data)` | `POST /api/nlp-openai-excess-inventory-report` |
| `sanitizeText(array $data)` | `POST /api/sanitize-text` |

### Advanced Segmentation (Admin)

| Method | Endpoint |
|--------|----------|
| `purchasingSegmentation(array $data)` | `POST /api/purchasing-segmentation` |
| `purchasingSegmentationDendrogram(array $data)` | `POST /api/purchasing-segmentation-dendrogram` |
| `segmentHierarchyChart(array $data)` | `POST /api/segment-hierarchy-chart` |
| `segmentSubsegmentExplore(array $data)` | `POST /api/segment-subsegment-explore` |
| `segmentClusterProfiles(array $data)` | `POST /api/segment-cluster-profiles` |

### Reporting (Admin)

| Method | Endpoint |
|--------|----------|
| `segmentationReport(array $data)` | `POST /api/segmentation-report` |
| `segmentationReportI18n(array $data, string $lang)` | `POST /api/segmentation-report-i18n?lang={lang}` |
| `segmentationReportJson(array $data, string $lang)` | `POST /api/segmentation-report-json?lang={lang}` |

### Async ML Jobs

| Method | Endpoint |
|--------|----------|
| `listJobs(?string $customerApiId, ?string $status, ?int $limit)` | `GET /api/jobs` |
| `getJobStatus(string $jobId)` | `GET /api/jobs/{jobId}/status` |
| `getJobResult(string $jobId)` | `GET /api/jobs/{jobId}/result` |

### Dead Letter Queue (Admin)

| Method | Endpoint |
|--------|----------|
| `listDlqMessages(?string $queueName, ?int $limit)` | `GET /api/dlq/messages` |
| `retryDlqMessage(string $jobId, ?string $queueName)` | `POST /api/dlq/retry/{jobId}` |
| `deleteDlqMessage(string $jobId, ?string $queueName)` | `DELETE /api/dlq/messages/{jobId}` |

## Route Resolver

The SDK includes a `RouteResolver` for semantic route permissions using dot notation. This is used when creating or updating customers via the Admin API.

```php
use EchoIntel\RouteResolver;

// Wildcard: all non-admin routes
RouteResolver::resolve(['*']);

// Entire category
RouteResolver::resolve(['forecasting']);

// Specific endpoint
RouteResolver::resolve(['forecasting.revenue', 'customer.segmentation']);

// List available categories
RouteResolver::categories();
// ['system', 'forecasting', 'inventory', 'customer', ...]

// List endpoints in a category
RouteResolver::endpoints('forecasting');
// ['revenue', 'cost', 'cost_improved', 'units', 'cost_totus']
```

## Error Handling

```php
use EchoIntel\Facades\EchoIntel;
use EchoIntel\Exceptions\EchoIntelException;
use EchoIntel\Exceptions\EchoIntelValidationException;
use EchoIntel\Exceptions\EchoIntelAuthenticationException;

try {
    $result = EchoIntel::forecastRevenue($data);
} catch (EchoIntelValidationException $e) {
    // HTTP 422
    $errors = $e->getErrors();
} catch (EchoIntelAuthenticationException $e) {
    // HTTP 401 / 403
    $message = $e->getMessage();
} catch (EchoIntelException $e) {
    // Other API errors
    $statusCode = $e->getStatusCode();
    $message = $e->getMessage();
}
```

## Configuration

After publishing, edit `config/echointel.php`:

```php
return [
    // Sandbox mode (default: true)
    // Set to false for production
    'sandbox' => filter_var(env('ECHOINTEL_SANDBOX', true), FILTER_VALIDATE_BOOLEAN),

    // Production URL
    'api_url' => env('ECHOINTEL_API_URL', 'https://ai.echosistema.live'),

    // Sandbox URL
    'sandbox_api_url' => env('ECHOINTEL_SANDBOX_API_URL', 'https://ai.echosistema.dev'),

    // Credentials
    'customer_api_id' => env('ECHOINTEL_CUSTOMER_API_ID'),
    'secret' => env('ECHOINTEL_SECRET'),
    'admin_secret' => env('ECHOINTEL_ADMIN_SECRET'),

    // Request timeout (seconds)
    'timeout' => env('ECHOINTEL_TIMEOUT', 30),

    // Retry on failure
    'retry' => [
        'attempts' => 3,
        'delay' => 100, // milliseconds
    ],
];
```

## Upgrading from v1.x to v2.0

### Breaking Changes

**API endpoint URLs changed from `snake_case` to `kebab-case`.**

This is a server-side change. The SDK methods remain the same -- no code changes are needed in your application. However, the underlying HTTP requests now target kebab-case URLs:

| v1.x | v2.0 |
|------|------|
| `/api/forecast_revenue` | `/api/forecast-revenue` |
| `/api/customer_segmentation` | `/api/customer-segmentation` |
| `/api/churn_risk` | `/api/churn-risk` |
| ... | ... |

**Default API URL changed.** The SDK now defaults to sandbox mode (`https://ai.echosistema.dev`). To use production, set `ECHOINTEL_SANDBOX=false` in your `.env`.

### New in v2.0

- **Sandbox mode toggle** via `ECHOINTEL_SANDBOX` environment variable
- Separate `ECHOINTEL_API_URL` (production) and `ECHOINTEL_SANDBOX_API_URL` (sandbox) configuration

## Testing

```bash
composer test
```

## Security

If you discover any security-related issues, please email security@echosistema.email instead of using the issue tracker.

## Credits

- [EchoSistema](https://echosistema.online)

## License

Proprietary. See [License File](LICENSE) for details.
