<?php

declare(strict_types=1);

namespace EchoIntel;

class Endpoints
{
    public const BASE_URL = 'https://ai.echosistema.live';
    public const SANDBOX_URL = 'https://ai.echosistema.dev';

    // System
    public const HEALTH = '/health';

    // Forecasting
    public const FORECAST_REVENUE = '/api/forecast-revenue';
    public const FORECAST_COST = '/api/forecast-cost';
    public const FORECAST_COST_IMPROVED = '/api/forecast-cost-improved';
    public const FORECAST_UNITS = '/api/forecast-units';
    public const FORECAST_COST_TOTUS = '/api/forecast-cost-totus';

    // Inventory
    public const INVENTORY_OPTIMIZATION = '/api/inventory-optimization';
    public const INVENTORY_HISTORY_IMPROVED = '/api/inventory-history-improved';

    // Customer Analytics
    public const CUSTOMER_SEGMENTATION = '/api/customer-segmentation';
    public const CUSTOMER_FEATURES = '/api/customer-features';
    public const CUSTOMER_LOYALTY = '/api/customer-loyalty';
    public const CUSTOMER_RFM = '/api/customer-rfm';
    public const CUSTOMER_CLV_FEATURES = '/api/customer-clv-features';
    public const CUSTOMER_CLV_FORECAST = '/api/customer-clv-forecast';

    // Churn
    public const CHURN_RISK = '/api/churn-risk';
    public const CHURN_LABEL = '/api/churn-label';

    // NPS
    public const NPS = '/api/nps';

    // Propensity
    public const PROPENSITY_BUY_PRODUCT = '/api/propensity-buy-product';
    public const PROPENSITY_RESPOND_CAMPAIGN = '/api/propensity-respond-campaign';
    public const PROPENSITY_UPGRADE_PLAN = '/api/propensity-upgrade-plan';

    // Recommendations
    public const RECOMMEND_USER_ITEMS = '/api/recommend-user-items';
    public const RECOMMEND_SIMILAR_ITEMS = '/api/recommend-similar-items';

    // Cross-Sell & Upsell
    public const CROSS_SELL_MATRIX = '/api/cross-sell-matrix';
    public const UPSELL_SUGGESTIONS = '/api/upsell-suggestions';

    // Dynamic Pricing
    public const DYNAMIC_PRICING_RECOMMEND = '/api/dynamic-pricing-recommend';

    // Sentiment
    public const SENTIMENT_REPORT = '/api/sentiment-report';
    public const SENTIMENT_REALTIME = '/api/sentiment-realtime';

    // Anomaly Detection
    public const ANOMALY_TRANSACTIONS = '/api/anomaly-transactions';
    public const ANOMALY_ACCOUNTS = '/api/anomaly-accounts';
    public const ANOMALY_GRAPH = '/api/anomaly-graph';

    // Credit Risk
    public const CREDIT_RISK_SCORE = '/api/credit-risk-score';
    public const CREDIT_RISK_EXPLAIN = '/api/credit-risk-explain';

    // Marketing Attribution
    public const CHANNEL_ATTRIBUTION = '/api/channel-attribution';
    public const UPLIFT_MODEL = '/api/uplift-model';

    // Customer Journey
    public const JOURNEY_MARKOV = '/api/journey-markov';
    public const JOURNEY_SEQUENCES = '/api/journey-sequences';

    // NLP
    public const NLP_ANALYSIS = '/api/nlp-analisys';
    public const NLP_ANALYSIS_EN = '/api/nlp-analisys-en';
    public const NLP_EXCESS_INVENTORY_REPORT = '/api/nlp-openai-excess-inventory-report';
    public const SANITIZE_TEXT = '/api/sanitize-text';

    // Advanced Segmentation (Admin)
    public const PURCHASING_SEGMENTATION = '/api/purchasing-segmentation';
    public const PURCHASING_SEGMENTATION_DENDROGRAM = '/api/purchasing-segmentation-dendrogram';
    public const SEGMENT_HIERARCHY_CHART = '/api/segment-hierarchy-chart';
    public const SEGMENT_SUBSEGMENT_EXPLORE = '/api/segment-subsegment-explore';
    public const SEGMENT_CLUSTER_PROFILES = '/api/segment-cluster-profiles';

    // Reporting (Admin)
    public const SEGMENTATION_REPORT = '/api/segmentation-report';
    public const SEGMENTATION_REPORT_I18N = '/api/segmentation-report-i18n';
    public const SEGMENTATION_REPORT_JSON = '/api/segmentation-report-json';

    // Async ML Jobs
    public const JOBS = '/api/jobs';
    public const DLQ_MESSAGES = '/api/dlq/messages';
    public const DLQ_RETRY = '/api/dlq/retry';

    // Admin
    public const ADMIN_CUSTOMERS = '/admin/customers';

    /**
     * Get all endpoints grouped by category.
     */
    public static function all(): array
    {
        return [
            'system' => [
                'health' => self::HEALTH,
            ],
            'forecasting' => [
                'revenue' => self::FORECAST_REVENUE,
                'cost' => self::FORECAST_COST,
                'cost_improved' => self::FORECAST_COST_IMPROVED,
                'units' => self::FORECAST_UNITS,
                'cost_totus' => self::FORECAST_COST_TOTUS,
            ],
            'inventory' => [
                'optimization' => self::INVENTORY_OPTIMIZATION,
                'history_improved' => self::INVENTORY_HISTORY_IMPROVED,
            ],
            'customer' => [
                'segmentation' => self::CUSTOMER_SEGMENTATION,
                'features' => self::CUSTOMER_FEATURES,
                'loyalty' => self::CUSTOMER_LOYALTY,
                'rfm' => self::CUSTOMER_RFM,
                'clv_features' => self::CUSTOMER_CLV_FEATURES,
                'clv_forecast' => self::CUSTOMER_CLV_FORECAST,
            ],
            'churn' => [
                'risk' => self::CHURN_RISK,
                'label' => self::CHURN_LABEL,
            ],
            'nps' => [
                'calculate' => self::NPS,
            ],
            'propensity' => [
                'buy_product' => self::PROPENSITY_BUY_PRODUCT,
                'respond_campaign' => self::PROPENSITY_RESPOND_CAMPAIGN,
                'upgrade_plan' => self::PROPENSITY_UPGRADE_PLAN,
            ],
            'recommendations' => [
                'user_items' => self::RECOMMEND_USER_ITEMS,
                'similar_items' => self::RECOMMEND_SIMILAR_ITEMS,
            ],
            'cross_sell' => [
                'matrix' => self::CROSS_SELL_MATRIX,
                'upsell' => self::UPSELL_SUGGESTIONS,
            ],
            'pricing' => [
                'dynamic' => self::DYNAMIC_PRICING_RECOMMEND,
            ],
            'sentiment' => [
                'report' => self::SENTIMENT_REPORT,
                'realtime' => self::SENTIMENT_REALTIME,
            ],
            'anomaly' => [
                'transactions' => self::ANOMALY_TRANSACTIONS,
                'accounts' => self::ANOMALY_ACCOUNTS,
                'graph' => self::ANOMALY_GRAPH,
            ],
            'credit_risk' => [
                'score' => self::CREDIT_RISK_SCORE,
                'explain' => self::CREDIT_RISK_EXPLAIN,
            ],
            'attribution' => [
                'channel' => self::CHANNEL_ATTRIBUTION,
                'uplift' => self::UPLIFT_MODEL,
            ],
            'journey' => [
                'markov' => self::JOURNEY_MARKOV,
                'sequences' => self::JOURNEY_SEQUENCES,
            ],
            'nlp' => [
                'analysis' => self::NLP_ANALYSIS,
                'analysis_en' => self::NLP_ANALYSIS_EN,
                'excess_inventory' => self::NLP_EXCESS_INVENTORY_REPORT,
                'sanitize' => self::SANITIZE_TEXT,
            ],
            'segmentation_admin' => [
                'purchasing' => self::PURCHASING_SEGMENTATION,
                'dendrogram' => self::PURCHASING_SEGMENTATION_DENDROGRAM,
                'hierarchy' => self::SEGMENT_HIERARCHY_CHART,
                'subsegment' => self::SEGMENT_SUBSEGMENT_EXPLORE,
                'profiles' => self::SEGMENT_CLUSTER_PROFILES,
            ],
            'reporting_admin' => [
                'report' => self::SEGMENTATION_REPORT,
                'report_i18n' => self::SEGMENTATION_REPORT_I18N,
                'report_json' => self::SEGMENTATION_REPORT_JSON,
            ],
            'jobs' => [
                'list' => self::JOBS,
                'dlq_messages' => self::DLQ_MESSAGES,
                'dlq_retry' => self::DLQ_RETRY,
            ],
            'admin' => [
                'customers' => self::ADMIN_CUSTOMERS,
            ],
        ];
    }
}
