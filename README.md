# EchoIntel Laravel SDK

A Laravel SDK for the EchoIntel AI API - providing artificial intelligence capabilities for forecasting, customer segmentation, inventory optimization, and more.

## Requirements

- PHP 8.1 or higher
- Laravel 10.x, 11.x, or 12.x
- Composer

## Installation

```bash
composer require echointel/laravel-sdk
```

The package will automatically register its service provider and facade using Laravel's auto-discovery.

### Publish Configuration

```bash
php artisan vendor:publish --tag=echointel-config
```

### Environment Variables

Add your API credentials to your `.env` file:

```env
ECHOINTEL_API_URL=https://ai.echosistema.live
ECHOINTEL_CUSTOMER_API_ID=your-customer-api-id
ECHOINTEL_SECRET=your-secret-key
ECHOINTEL_TIMEOUT=30
```

## Quick Start

### Using the Facade

```php
use EchoIntel\Facades\EchoIntel;

// Forecast revenue
$result = EchoIntel::forecastRevenue([
    'forecast_period' => 12,
    'data' => [
        ['date' => '2024-01-01', 'revenue' => 10000],
        ['date' => '2024-02-01', 'revenue' => 12000],
    ]
]);

// Customer segmentation
$segments = EchoIntel::customerSegmentation([
    'data' => $customerRecords,
    'max_clusters' => 5
]);

// Health check
$health = EchoIntel::health();
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
            'data' => $request->data
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

### Forecasting

| Method | Description |
|--------|-------------|
| `forecastRevenue(array $data)` | Forecast future revenue based on historical data |
| `forecastCost(array $data)` | Forecast future costs |
| `forecastCostImproved(array $data)` | Enhanced cost forecasting with improved algorithms |
| `forecastUnits(array $data)` | Forecast unit sales for a specific product |
| `forecastCostTotus(array $data)` | Specialized cost forecasting for Totus |

### Inventory

| Method | Description |
|--------|-------------|
| `inventoryOptimization(array $data)` | Optimize inventory levels |
| `inventoryHistoryImproved(array $data)` | Analyze inventory history with enhanced insights |

### Customer Analytics

| Method | Description |
|--------|-------------|
| `customerSegmentation(array $data)` | Segment customers using ML algorithms |
| `customerFeatures(array $data)` | Build customer feature sets |
| `customerLoyalty(array $data)` | Calculate customer loyalty scores |
| `customerRfm(array $data)` | RFM (Recency, Frequency, Monetary) analysis |
| `customerClvFeatures(array $data)` | Customer Lifetime Value feature extraction |
| `customerClvForecast(array $data)` | Forecast Customer Lifetime Value |

### Churn Analysis

| Method | Description |
|--------|-------------|
| `churnRisk(array $data)` | Predict customer churn risk |
| `churnLabel(array $data)` | Label customers by churn status (SaaS, e-commerce, prepaid) |

### NPS (Net Promoter Score)

| Method | Description |
|--------|-------------|
| `nps(array $data)` | Calculate NPS scores with optional grouping |

### Propensity Modeling

| Method | Description |
|--------|-------------|
| `propensityBuyProduct(array $data)` | Predict likelihood to purchase a product |
| `propensityRespondCampaign(array $data)` | Predict campaign response probability |
| `propensityUpgradePlan(array $data)` | Predict plan upgrade likelihood |

### Recommendations

| Method | Description |
|--------|-------------|
| `recommendUserItems(array $data)` | Get personalized item recommendations for users |
| `recommendSimilarItems(array $data)` | Find similar items |

### Cross-Sell & Upsell

| Method | Description |
|--------|-------------|
| `crossSellMatrix(array $data)` | Generate cross-sell opportunity matrix |
| `upsellSuggestions(array $data)` | Get upsell suggestions |

### Dynamic Pricing

| Method | Description |
|--------|-------------|
| `dynamicPricingRecommend(array $data)` | Get optimal price recommendations |

### Sentiment Analysis

| Method | Description |
|--------|-------------|
| `sentimentReport(array $data)` | Generate sentiment analysis reports |
| `sentimentRealtime(array $data)` | Real-time sentiment analysis |

### Anomaly Detection

| Method | Description |
|--------|-------------|
| `anomalyTransactions(array $data)` | Detect anomalous transactions |
| `anomalyAccounts(array $data)` | Detect anomalous accounts |
| `anomalyGraph(array $data)` | Graph-based anomaly detection |

### Credit Risk

| Method | Description |
|--------|-------------|
| `creditRiskScore(array $data)` | Calculate credit risk scores |
| `creditRiskExplain(array $data)` | Explain credit risk predictions |

### Marketing Attribution

| Method | Description |
|--------|-------------|
| `channelAttribution(array $data)` | Multi-touch channel attribution |
| `upliftModel(array $data)` | Measure uplift from marketing interventions |

### Customer Journey

| Method | Description |
|--------|-------------|
| `journeyMarkov(array $data)` | Markov chain journey analysis |
| `journeySequences(array $data)` | Discover frequent journey sequences |

### NLP & Text Processing

| Method | Description |
|--------|-------------|
| `nlpAnalysis(array $data)` | Natural language processing analysis |
| `nlpAnalysisEn(array $data)` | NLP analysis (English) |
| `nlpExcessInventoryReport(array $data)` | Generate excess inventory reports using NLP |
| `sanitizeText(array $data)` | Sanitize and clean text data |

### Advanced Segmentation

| Method | Description |
|--------|-------------|
| `purchasingSegmentation(array $data)` | Advanced purchasing behavior segmentation |
| `purchasingSegmentationDendrogram(array $data)` | Generate segmentation dendrogram |
| `segmentHierarchyChart(array $data)` | Create segment hierarchy chart |
| `segmentSubsegmentExplore(array $data)` | Explore sub-segments within segments |
| `segmentClusterProfiles(array $data)` | Generate cluster profiles |

### Reporting

| Method | Description |
|--------|-------------|
| `segmentationReport(array $data)` | Generate segmentation report |
| `segmentationReportI18n(array $data, string $lang)` | Internationalized segmentation report (pt, es) |
| `segmentationReportJson(array $data, string $lang)` | Segmentation report in JSON format (pt, es, en) |

### System

| Method | Description |
|--------|-------------|
| `health()` | Check API health status |

## Error Handling

```php
use EchoIntel\Facades\EchoIntel;
use EchoIntel\Exceptions\EchoIntelException;
use EchoIntel\Exceptions\EchoIntelValidationException;
use EchoIntel\Exceptions\EchoIntelAuthenticationException;

try {
    $result = EchoIntel::forecastRevenue($data);
} catch (EchoIntelValidationException $e) {
    // Handle validation errors (HTTP 422)
    $errors = $e->getErrors();
    Log::warning('EchoIntel validation error', ['errors' => $errors]);
} catch (EchoIntelAuthenticationException $e) {
    // Handle authentication errors (HTTP 401/403)
    Log::error('EchoIntel authentication failed');
} catch (EchoIntelException $e) {
    // Handle general API errors
    $statusCode = $e->getStatusCode();
    $message = $e->getMessage();
    Log::error('EchoIntel API error', [
        'status' => $statusCode,
        'message' => $message
    ]);
}
```

## Configuration

After publishing the config file, you can customize the settings in `config/echointel.php`:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | EchoIntel API URL
    |--------------------------------------------------------------------------
    */
    'api_url' => env('ECHOINTEL_API_URL', 'https://ai.echosistema.live'),

    /*
    |--------------------------------------------------------------------------
    | Customer API ID
    |--------------------------------------------------------------------------
    */
    'customer_api_id' => env('ECHOINTEL_CUSTOMER_API_ID'),

    /*
    |--------------------------------------------------------------------------
    | API Secret
    |--------------------------------------------------------------------------
    */
    'secret' => env('ECHOINTEL_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    */
    'timeout' => env('ECHOINTEL_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Retry Configuration
    |--------------------------------------------------------------------------
    */
    'retry' => [
        'attempts' => 3,
        'delay' => 100, // milliseconds
    ],
];
```

## Testing

```bash
composer test
```

## Security

If you discover any security-related issues, please email security@echosistema.email instead of using the issue tracker.

## Credits

- [EchoSistema](https://echosistema.online)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
