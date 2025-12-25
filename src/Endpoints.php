<?php

declare(strict_types=1);

namespace EchoIntel;

class Endpoints
{
    public const BASE_URL = 'https://ai.echosistema.live';

    // System
    public const HEALTH = '/health';

    // Forecasting
    public const FORECAST_REVENUE = '/api/forecast_revenue';
    public const FORECAST_COST = '/api/forecast_cost';
    public const FORECAST_COST_IMPROVED = '/api/forecast_cost_improved';
    public const FORECAST_UNITS = '/api/forecast_units';
    public const FORECAST_COST_TOTUS = '/api/forecast_cost_totus';

    // Inventory
    public const INVENTORY_OPTIMIZATION = '/api/inventory_optimization';
    public const INVENTORY_HISTORY_IMPROVED = '/api/inventory_history_improved';

    // Customer Analytics
    public const CUSTOMER_SEGMENTATION = '/api/customer_segmentation';
    public const CUSTOMER_FEATURES = '/api/customer_features';
    public const CUSTOMER_LOYALTY = '/api/customer_loyalty';
    public const CUSTOMER_RFM = '/api/customer_rfm';
    public const CUSTOMER_CLV_FEATURES = '/api/customer_clv_features';
    public const CUSTOMER_CLV_FORECAST = '/api/customer_clv_forecast';

    // Churn
    public const CHURN_RISK = '/api/churn_risk';
    public const CHURN_LABEL = '/api/churn_label';

    // NPS
    public const NPS = '/api/nps';

    // Propensity
    public const PROPENSITY_BUY_PRODUCT = '/api/propensity_buy_product';
    public const PROPENSITY_RESPOND_CAMPAIGN = '/api/propensity_respond_campaign';
    public const PROPENSITY_UPGRADE_PLAN = '/api/propensity_upgrade_plan';

    // Recommendations
    public const RECOMMEND_USER_ITEMS = '/api/recommend_user_items';
    public const RECOMMEND_SIMILAR_ITEMS = '/api/recommend_similar_items';

    // Cross-Sell & Upsell
    public const CROSS_SELL_MATRIX = '/api/cross_sell_matrix';
    public const UPSELL_SUGGESTIONS = '/api/upsell_suggestions';

    // Dynamic Pricing
    public const DYNAMIC_PRICING_RECOMMEND = '/api/dynamic_pricing_recommend';

    // Sentiment
    public const SENTIMENT_REPORT = '/api/sentiment_report';
    public const SENTIMENT_REALTIME = '/api/sentiment_realtime';

    // Anomaly Detection
    public const ANOMALY_TRANSACTIONS = '/api/anomaly_transactions';
    public const ANOMALY_ACCOUNTS = '/api/anomaly_accounts';
    public const ANOMALY_GRAPH = '/api/anomaly_graph';

    // Credit Risk
    public const CREDIT_RISK_SCORE = '/api/credit_risk_score';
    public const CREDIT_RISK_EXPLAIN = '/api/credit_risk_explain';

    // Marketing Attribution
    public const CHANNEL_ATTRIBUTION = '/api/channel_attribution';
    public const UPLIFT_MODEL = '/api/uplift_model';

    // Customer Journey
    public const JOURNEY_MARKOV = '/api/journey_markov';
    public const JOURNEY_SEQUENCES = '/api/journey_sequences';

    // NLP
    public const NLP_ANALYSIS = '/api/nlp_analisys';
    public const NLP_ANALYSIS_EN = '/api/nlp_analisys_en';
    public const NLP_EXCESS_INVENTORY_REPORT = '/api/nlp_openai_excess_inventory_report';
    public const SANITIZE_TEXT = '/api/sanitize_text';

    // Advanced Segmentation (Admin)
    public const PURCHASING_SEGMENTATION = '/api/purchasing_segmentation';
    public const PURCHASING_SEGMENTATION_DENDROGRAM = '/api/purchasing_segmentation_dendrogram';
    public const SEGMENT_HIERARCHY_CHART = '/api/segment_hierarchy_chart';
    public const SEGMENT_SUBSEGMENT_EXPLORE = '/api/segment_subsegment_explore';
    public const SEGMENT_CLUSTER_PROFILES = '/api/segment_cluster_profiles';

    // Reporting (Admin)
    public const SEGMENTATION_REPORT = '/api/segmentation_report';
    public const SEGMENTATION_REPORT_I18N = '/api/segmentation_report_i18n';
    public const SEGMENTATION_REPORT_JSON = '/api/segmentation_report_json';

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
            'admin' => [
                'customers' => self::ADMIN_CUSTOMERS,
            ],
        ];
    }
}
