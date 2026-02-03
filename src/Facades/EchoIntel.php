<?php

declare(strict_types=1);

namespace EchoIntel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array health()
 * @method static array forecastRevenue(array $data)
 * @method static array forecastCost(array $data)
 * @method static array forecastCostImproved(array $data)
 * @method static array forecastUnits(array $data)
 * @method static array forecastCostTotus(array $data)
 * @method static array inventoryOptimization(array $data)
 * @method static array inventoryHistoryImproved(array $data)
 * @method static array customerSegmentation(array $data)
 * @method static array customerFeatures(array $data)
 * @method static array customerLoyalty(array $data)
 * @method static array customerRfm(array $data)
 * @method static array customerClvFeatures(array $data)
 * @method static array customerClvForecast(array $data)
 * @method static array churnRisk(array $data)
 * @method static array churnLabel(array $data)
 * @method static array nps(array $data)
 * @method static array propensityBuyProduct(array $data)
 * @method static array propensityRespondCampaign(array $data)
 * @method static array propensityUpgradePlan(array $data)
 * @method static array recommendUserItems(array $data)
 * @method static array recommendSimilarItems(array $data)
 * @method static array crossSellMatrix(array $data)
 * @method static array upsellSuggestions(array $data)
 * @method static array dynamicPricingRecommend(array $data)
 * @method static array sentimentReport(array $data)
 * @method static array sentimentRealtime(array $data)
 * @method static array anomalyTransactions(array $data)
 * @method static array anomalyAccounts(array $data)
 * @method static array anomalyGraph(array $data)
 * @method static array creditRiskScore(array $data)
 * @method static array creditRiskExplain(array $data)
 * @method static array channelAttribution(array $data)
 * @method static array upliftModel(array $data)
 * @method static array journeyMarkov(array $data)
 * @method static array journeySequences(array $data)
 * @method static array nlpAnalysis(array $data)
 * @method static array nlpAnalysisEn(array $data)
 * @method static array nlpExcessInventoryReport(array $data)
 * @method static array sanitizeText(array $data)
 * @method static array purchasingSegmentation(array $data)
 * @method static array purchasingSegmentationDendrogram(array $data)
 * @method static array segmentHierarchyChart(array $data)
 * @method static array segmentSubsegmentExplore(array $data)
 * @method static array segmentClusterProfiles(array $data)
 * @method static array segmentationReport(array $data)
 * @method static array segmentationReportI18n(array $data, string $lang = 'pt')
 * @method static array segmentationReportJson(array $data, string $lang = 'en')
 * @method static array createCustomer(array $data)
 * @method static array listCustomers(bool $includeDisabled = false)
 * @method static array getCustomer(string $customerId)
 * @method static array updateCustomer(string $customerId, array $data)
 * @method static array deleteCustomer(string $customerId)
 *
 * @see \EchoIntel\EchoIntelClient
 */
class EchoIntel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'echointel';
    }
}
