<?php

declare(strict_types=1);

namespace EchoIntel;

class RouteResolver
{
    /**
     * Categories excluded from wildcard (*) resolution.
     * These require admin credentials.
     */
    private const ADMIN_CATEGORIES = ['admin'];

    /**
     * Resolve allowed routes from dot notation to URIs.
     *
     * @param array $routes Array of route patterns (e.g., ['*'], ['forecasting'], ['forecasting.revenue'])
     * @return array Array of resolved URIs
     */
    public static function resolve(array $routes): array
    {
        if (in_array('*', $routes, true)) {
            return self::resolveWildcard();
        }

        $resolved = [];

        foreach ($routes as $route) {
            array_push($resolved, ...self::resolveRoute($route));
        }

        return array_values(array_unique($resolved));
    }

    /**
     * Resolve wildcard (*) to all non-admin routes.
     */
    private static function resolveWildcard(): array
    {
        $all = Endpoints::all();
        $resolved = [];

        foreach ($all as $category => $endpoints) {
            if (in_array($category, self::ADMIN_CATEGORIES, true)) {
                continue;
            }

            foreach ($endpoints as $uri) {
                $resolved[] = $uri;
            }
        }

        return array_values($resolved);
    }

    /**
     * Resolve a single route pattern.
     *
     * @param string $route Route pattern (e.g., 'forecasting' or 'forecasting.revenue')
     * @return array Array of resolved URIs
     */
    private static function resolveRoute(string $route): array
    {
        $all = Endpoints::all();

        if (!str_contains($route, '.')) {
            return self::resolveCategoryRoutes($route, $all);
        }

        return self::resolveSpecificRoute($route, $all);
    }

    /**
     * Resolve all routes for a category.
     *
     * @param string $category Category name (e.g., 'forecasting')
     * @param array $all All endpoints grouped by category
     * @return array Array of resolved URIs
     */
    private static function resolveCategoryRoutes(string $category, array $all): array
    {
        if (!isset($all[$category])) {
            return [$category];
        }

        return array_values($all[$category]);
    }

    /**
     * Resolve a specific endpoint route.
     *
     * @param string $route Route in dot notation (e.g., 'forecasting.revenue')
     * @param array $all All endpoints grouped by category
     * @return array Array with single resolved URI
     */
    private static function resolveSpecificRoute(string $route, array $all): array
    {
        [$category, $endpoint] = explode('.', $route, 2);

        if (!isset($all[$category][$endpoint])) {
            return [$route];
        }

        return [$all[$category][$endpoint]];
    }

    /**
     * Get all available categories.
     *
     * @return array List of category names
     */
    public static function categories(): array
    {
        return array_keys(Endpoints::all());
    }

    /**
     * Get all available endpoints for a category.
     *
     * @param string $category Category name
     * @return array List of endpoint names
     */
    public static function endpoints(string $category): array
    {
        $all = Endpoints::all();

        if (!isset($all[$category])) {
            return [];
        }

        return array_keys($all[$category]);
    }
}
