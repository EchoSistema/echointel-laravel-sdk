<?php

declare(strict_types=1);

namespace EchoIntel;

use EchoIntel\Exceptions\EchoIntelAuthenticationException;
use EchoIntel\Exceptions\EchoIntelException;
use EchoIntel\Exceptions\EchoIntelValidationException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class EchoIntelClient
{
    protected Client $httpClient;
    protected string $baseUrl;
    protected ?string $customerApiId;
    protected ?string $secret;
    protected ?string $adminSecret;
    protected int $timeout;
    protected array $retry;

    public function __construct(array $config = [])
    {
        $this->baseUrl = rtrim($config['base_url'] ?? Endpoints::BASE_URL, '/');
        $this->customerApiId = $config['customer_api_id'] ?? null;
        $this->secret = $config['secret'] ?? null;
        $this->adminSecret = $config['admin_secret'] ?? null;
        $this->timeout = $config['timeout'] ?? 30;
        $this->retry = $config['retry'] ?? ['attempts' => 3, 'delay' => 100];

        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => $this->timeout,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    // =========================================================================
    // SYSTEM
    // =========================================================================

    public function health(): array
    {
        return $this->request('GET', Endpoints::HEALTH);
    }

    // =========================================================================
    // FORECASTING
    // =========================================================================

    public function forecastRevenue(array $data): array
    {
        return $this->request('POST', Endpoints::FORECAST_REVENUE, $data);
    }

    public function forecastCost(array $data): array
    {
        return $this->request('POST', Endpoints::FORECAST_COST, $data);
    }

    public function forecastCostImproved(array $data): array
    {
        return $this->request('POST', Endpoints::FORECAST_COST_IMPROVED, $data);
    }

    public function forecastUnits(array $data): array
    {
        return $this->request('POST', Endpoints::FORECAST_UNITS, $data);
    }

    public function forecastCostTotus(array $data): array
    {
        return $this->request('POST', Endpoints::FORECAST_COST_TOTUS, $data);
    }

    // =========================================================================
    // INVENTORY
    // =========================================================================

    public function inventoryOptimization(array $data): array
    {
        return $this->request('POST', Endpoints::INVENTORY_OPTIMIZATION, $data);
    }

    public function inventoryHistoryImproved(array $data): array
    {
        return $this->request('POST', Endpoints::INVENTORY_HISTORY_IMPROVED, $data);
    }

    // =========================================================================
    // CUSTOMER ANALYTICS
    // =========================================================================

    public function customerSegmentation(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_SEGMENTATION, $data);
    }

    public function customerFeatures(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_FEATURES, $data);
    }

    public function customerLoyalty(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_LOYALTY, $data);
    }

    public function customerRfm(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_RFM, $data);
    }

    public function customerClvFeatures(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_CLV_FEATURES, $data);
    }

    public function customerClvForecast(array $data): array
    {
        return $this->request('POST', Endpoints::CUSTOMER_CLV_FORECAST, $data);
    }

    // =========================================================================
    // CHURN ANALYSIS
    // =========================================================================

    public function churnRisk(array $data): array
    {
        return $this->request('POST', Endpoints::CHURN_RISK, $data);
    }

    public function churnLabel(array $data): array
    {
        return $this->request('POST', Endpoints::CHURN_LABEL, $data);
    }

    // =========================================================================
    // NPS
    // =========================================================================

    public function nps(array $data): array
    {
        return $this->request('POST', Endpoints::NPS, $data);
    }

    // =========================================================================
    // PROPENSITY MODELING
    // =========================================================================

    public function propensityBuyProduct(array $data): array
    {
        return $this->request('POST', Endpoints::PROPENSITY_BUY_PRODUCT, $data);
    }

    public function propensityRespondCampaign(array $data): array
    {
        return $this->request('POST', Endpoints::PROPENSITY_RESPOND_CAMPAIGN, $data);
    }

    public function propensityUpgradePlan(array $data): array
    {
        return $this->request('POST', Endpoints::PROPENSITY_UPGRADE_PLAN, $data);
    }

    // =========================================================================
    // RECOMMENDATIONS
    // =========================================================================

    public function recommendUserItems(array $data): array
    {
        return $this->request('POST', Endpoints::RECOMMEND_USER_ITEMS, $data);
    }

    public function recommendSimilarItems(array $data): array
    {
        return $this->request('POST', Endpoints::RECOMMEND_SIMILAR_ITEMS, $data);
    }

    // =========================================================================
    // CROSS-SELL & UPSELL
    // =========================================================================

    public function crossSellMatrix(array $data): array
    {
        return $this->request('POST', Endpoints::CROSS_SELL_MATRIX, $data);
    }

    public function upsellSuggestions(array $data): array
    {
        return $this->request('POST', Endpoints::UPSELL_SUGGESTIONS, $data);
    }

    // =========================================================================
    // DYNAMIC PRICING
    // =========================================================================

    public function dynamicPricingRecommend(array $data): array
    {
        return $this->request('POST', Endpoints::DYNAMIC_PRICING_RECOMMEND, $data);
    }

    // =========================================================================
    // SENTIMENT ANALYSIS
    // =========================================================================

    public function sentimentReport(array $data): array
    {
        return $this->request('POST', Endpoints::SENTIMENT_REPORT, $data);
    }

    public function sentimentRealtime(array $data): array
    {
        return $this->request('POST', Endpoints::SENTIMENT_REALTIME, $data);
    }

    // =========================================================================
    // ANOMALY DETECTION
    // =========================================================================

    public function anomalyTransactions(array $data): array
    {
        return $this->request('POST', Endpoints::ANOMALY_TRANSACTIONS, $data);
    }

    public function anomalyAccounts(array $data): array
    {
        return $this->request('POST', Endpoints::ANOMALY_ACCOUNTS, $data);
    }

    public function anomalyGraph(array $data): array
    {
        return $this->request('POST', Endpoints::ANOMALY_GRAPH, $data);
    }

    // =========================================================================
    // CREDIT RISK
    // =========================================================================

    public function creditRiskScore(array $data): array
    {
        return $this->request('POST', Endpoints::CREDIT_RISK_SCORE, $data);
    }

    public function creditRiskExplain(array $data): array
    {
        return $this->request('POST', Endpoints::CREDIT_RISK_EXPLAIN, $data);
    }

    // =========================================================================
    // MARKETING ATTRIBUTION
    // =========================================================================

    public function channelAttribution(array $data): array
    {
        return $this->request('POST', Endpoints::CHANNEL_ATTRIBUTION, $data);
    }

    public function upliftModel(array $data): array
    {
        return $this->request('POST', Endpoints::UPLIFT_MODEL, $data);
    }

    // =========================================================================
    // CUSTOMER JOURNEY
    // =========================================================================

    public function journeyMarkov(array $data): array
    {
        return $this->request('POST', Endpoints::JOURNEY_MARKOV, $data);
    }

    public function journeySequences(array $data): array
    {
        return $this->request('POST', Endpoints::JOURNEY_SEQUENCES, $data);
    }

    // =========================================================================
    // NLP & TEXT PROCESSING
    // =========================================================================

    public function nlpAnalysis(array $data): array
    {
        return $this->request('POST', Endpoints::NLP_ANALYSIS, $data);
    }

    public function nlpAnalysisEn(array $data): array
    {
        return $this->request('POST', Endpoints::NLP_ANALYSIS_EN, $data);
    }

    public function nlpExcessInventoryReport(array $data): array
    {
        return $this->request('POST', Endpoints::NLP_EXCESS_INVENTORY_REPORT, $data);
    }

    public function sanitizeText(array $data): array
    {
        return $this->request('POST', Endpoints::SANITIZE_TEXT, $data);
    }

    // =========================================================================
    // ADVANCED SEGMENTATION (ADMIN)
    // =========================================================================

    public function purchasingSegmentation(array $data): array
    {
        return $this->request('POST', Endpoints::PURCHASING_SEGMENTATION, $data, true);
    }

    public function purchasingSegmentationDendrogram(array $data): array
    {
        return $this->request('POST', Endpoints::PURCHASING_SEGMENTATION_DENDROGRAM, $data, true);
    }

    public function segmentHierarchyChart(array $data): array
    {
        return $this->request('POST', Endpoints::SEGMENT_HIERARCHY_CHART, $data, true);
    }

    public function segmentSubsegmentExplore(array $data): array
    {
        return $this->request('POST', Endpoints::SEGMENT_SUBSEGMENT_EXPLORE, $data, true);
    }

    public function segmentClusterProfiles(array $data): array
    {
        return $this->request('POST', Endpoints::SEGMENT_CLUSTER_PROFILES, $data, true);
    }

    // =========================================================================
    // REPORTING (ADMIN)
    // =========================================================================

    public function segmentationReport(array $data): array
    {
        return $this->request('POST', Endpoints::SEGMENTATION_REPORT, $data, true);
    }

    public function segmentationReportI18n(array $data, string $lang = 'pt'): array
    {
        return $this->request('POST', Endpoints::SEGMENTATION_REPORT_I18N . "?lang={$lang}", $data, true);
    }

    public function segmentationReportJson(array $data, string $lang = 'en'): array
    {
        return $this->request('POST', Endpoints::SEGMENTATION_REPORT_JSON . "?lang={$lang}", $data, true);
    }

    // =========================================================================
    // ADMIN OPERATIONS
    // =========================================================================

    public function createCustomer(array $data): array
    {
        if (isset($data['allowed_routes'])) {
            $data['allowed_routes'] = RouteResolver::resolve($data['allowed_routes']);
        }

        return $this->requestAdmin('POST', Endpoints::ADMIN_CUSTOMERS, $data);
    }

    public function listCustomers(bool $includeDisabled = false): array
    {
        $query = $includeDisabled ? '?include_disabled=true' : '';
        return $this->requestAdmin('GET', Endpoints::ADMIN_CUSTOMERS . $query);
    }

    public function getCustomer(string $customerId): array
    {
        return $this->requestAdmin('GET', Endpoints::ADMIN_CUSTOMERS . "/{$customerId}");
    }

    public function updateCustomer(string $customerId, array $data): array
    {
        if (isset($data['allowed_routes'])) {
            $data['allowed_routes'] = RouteResolver::resolve($data['allowed_routes']);
        }

        return $this->requestAdmin('PUT', Endpoints::ADMIN_CUSTOMERS . "/{$customerId}", $data);
    }

    public function deleteCustomer(string $customerId): array
    {
        return $this->requestAdmin('DELETE', Endpoints::ADMIN_CUSTOMERS . "/{$customerId}");
    }

    // =========================================================================
    // HTTP METHODS
    // =========================================================================

    protected function request(string $method, string $endpoint, array $data = [], bool $withAuth = false): array
    {
        $options = [];

        if (!empty($data)) {
            $options['json'] = $data;
        }

        if ($withAuth) {
            $options['headers'] = $this->getAuthHeaders();
        }

        return $this->executeRequest($method, $endpoint, $options);
    }

    protected function requestAdmin(string $method, string $endpoint, array $data = []): array
    {
        $options = [
            'headers' => [
                'X-ADMIN-SECRET' => $this->adminSecret,
            ],
        ];

        if (!empty($data)) {
            $options['json'] = $data;
        }

        return $this->executeRequest($method, $endpoint, $options);
    }

    protected function getAuthHeaders(): array
    {
        return [
            'X-ADMIN-SECRET' => $this->adminSecret,
            'X-Customer-Api-Id' => $this->customerApiId,
            'X-Secret' => $this->secret,
        ];
    }

    protected function executeRequest(string $method, string $endpoint, array $options = []): array
    {
        $attempts = 0;
        $maxAttempts = $this->retry['attempts'];
        $delay = $this->retry['delay'];

        while ($attempts < $maxAttempts) {
            try {
                $response = $this->httpClient->request($method, $endpoint, $options);
                $body = $response->getBody()->getContents();

                return json_decode($body, true) ?? [];
            } catch (ClientException $e) {
                $this->handleClientException($e);
            } catch (GuzzleException $e) {
                $attempts++;

                if ($attempts >= $maxAttempts) {
                    throw new EchoIntelException(
                        "Request failed after {$maxAttempts} attempts: " . $e->getMessage(),
                        null,
                        [],
                        $e
                    );
                }

                usleep($delay * 1000);
            }
        }

        return [];
    }

    protected function handleClientException(ClientException $e): never
    {
        $response = $e->getResponse();
        $statusCode = $response->getStatusCode();
        $body = json_decode($response->getBody()->getContents(), true) ?? [];

        if ($statusCode === 401 || $statusCode === 403) {
            throw new EchoIntelAuthenticationException(
                $body['detail'] ?? 'Authentication failed',
                $statusCode,
                $e
            );
        }

        if ($statusCode === 422) {
            throw new EchoIntelValidationException(
                $body['detail'] ?? 'Validation failed',
                $body['errors'] ?? $body['detail'] ?? [],
                $e
            );
        }

        throw new EchoIntelException(
            $body['detail'] ?? $e->getMessage(),
            $statusCode,
            $body,
            $e
        );
    }
}
