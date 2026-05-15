<?php
/**
 * Template Functions
 *
 * @package CityWorks
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get hero section data
 */
function cityworks_get_hero_data() {
    return array(
        'title'       => get_theme_mod('hero_title', 'Enterprise Cloud, AI & Security Solutions for Modern Businesses'),
        'subtitle'    => get_theme_mod('hero_subtitle', 'We help organizations modernize infrastructure, deploy AI solutions and secure operations using Google Cloud technologies.'),
        'cta_text'    => get_theme_mod('hero_cta_text', 'Talk to a Cloud Architect'),
        'cta_link'    => get_theme_mod('hero_cta_link', '#contact'),
        'badge'       => get_theme_mod('hero_badge', 'Google Cloud Partner'),
    );
}

/**
 * Get services data con icons
 */
function cityworks_get_services() {
    $service_posts = get_posts(array(
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
    ));

    if (!empty($service_posts)) {
        return array_map(function($post) {
            return array(
                'title'   => get_the_title($post),
                'icon'    => get_post_meta($post->ID, 'service_icon', true) ?: 'cloud',
                'excerpt' => has_excerpt($post) ? get_the_excerpt($post) : wp_trim_words(wp_strip_all_tags($post->post_content), 24),
                'link'    => get_permalink($post),
            );
        }, $service_posts);
    }

    return array(
        array(
            'title'     => 'Cloud Migration',
            'icon'      => 'cloud',
            'excerpt'   => 'Seamlessly migrate workloads to Google Cloud with minimal downtime and maximum performance.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'AI & Vertex AI',
            'icon'      => 'brain',
            'excerpt'   => 'Deploy generative AI, machine learning models and intelligent automation at scale.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'Data Analytics',
            'icon'      => 'bar-chart',
            'excerpt'   => 'Unlock insights with BigQuery, Looker and real-time data pipelines.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'Cybersecurity',
            'icon'      => 'shield',
            'excerpt'   => 'Protect your cloud environment with Zero Trust, Mandiant and Chronicle SIEM.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'Kubernetes & GKE',
            'icon'      => 'box',
            'excerpt'   => 'Container orchestration, microservices and cloud-native application modernization.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'Google Workspace',
            'icon'      => 'briefcase',
            'excerpt'   => 'Collaboration, productivity and security with Gemini AI integrated.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'DevOps & CI/CD',
            'icon'      => 'git-branch',
            'excerpt'   => 'Automated pipelines, infrastructure as code and continuous delivery.',
            'link'      => '#contact',
        ),
        array(
            'title'     => 'Managed Infrastructure',
            'icon'      => 'server',
            'excerpt'   => '24/7 monitoring, optimization and proactive management of your cloud.',
            'link'      => '#contact',
        ),
    );
}

/**
 * Get stats data
 */
function cityworks_get_stats() {
    return array(
        array(
            'value' => '50+',
            'label' => 'Enterprise Projects',
        ),
        array(
            'value' => '20+',
            'label' => 'Certified Engineers',
        ),
        array(
            'value' => '99.9%',
            'label' => 'Availability SLA',
        ),
        array(
            'value' => '5',
            'label' => 'Countries in LATAM',
        ),
    );
}

/**
 * Get industries data
 */
function cityworks_get_industries() {
    return array(
        'Financial Services' => array(
            'Apigee | API Management & Open Banking',
            'Google Kubernetes | Core Banking Modernization',
            'Agentspace | AI-Powered Customer Service',
            'Chronicle | Threat Detection & Compliance',
        ),
        'Healthcare & Life Sciences' => array(
            'Healthcare Data Engine | Unified patient data',
            'Vertex AI | Medical imaging analysis',
            'Document AI | Claims processing automation',
            'Workspace | HIPAA-compliant collaboration',
        ),
        'Retail & CPG' => array(
            'Customer Data Platform | 360-degree view',
            'Agentspace | 24/7 customer support',
            'BigQuery | Demand forecasting analytics',
            'Cloud Retail Commerce | Scalable e-commerce',
        ),
        'Public Sector' => array(
            'Google Workspace | Digital government',
            'Document AI | Procedure digitization',
            'BigQuery | Policy impact analytics',
            'Chronicle | Citizen data protection',
        ),
        'Manufacturing' => array(
            'Manufacturing Data Engine | Production optimization',
            'Vertex AI | Predictive maintenance',
            'Google Cloud IoT | Supply chain visibility',
            'Looker | Operations dashboard',
        ),
    );
}

/**
 * Get Priority Plays 2026 solution pillars.
 */
function cityworks_get_priority_plays() {
    return array(
        array(
            'title' => __('AI', 'cityworks'),
            'icon' => 'ph-brain',
            'summary' => __('Convertimos casos de uso de IA en flujos productivos, gobernados y medibles.', 'cityworks'),
            'outcome' => __('Automatizacion inteligente sin perder control operativo.', 'cityworks'),
            'items' => array('Vertex AI', 'Gemini for Google Cloud', 'Document AI', 'AI governance'),
        ),
        array(
            'title' => __('Data', 'cityworks'),
            'icon' => 'ph-chart-line-up',
            'summary' => __('Creamos bases modernas de datos para analitica, reporting, automatizacion e IA.', 'cityworks'),
            'outcome' => __('Decisiones mas rapidas con datos confiables.', 'cityworks'),
            'items' => array('BigQuery', 'Looker', 'Data pipelines', 'Data quality'),
        ),
        array(
            'title' => __('Infrastructure', 'cityworks'),
            'icon' => 'ph-cloud',
            'summary' => __('Disenamos fundamentos cloud seguros para migracion, modernizacion y plataformas escalables.', 'cityworks'),
            'outcome' => __('Operaciones resilientes con menor friccion tecnica.', 'cityworks'),
            'items' => array('Cloud migration', 'GKE', 'Landing zones', 'Platform engineering'),
        ),
        array(
            'title' => __('Security', 'cityworks'),
            'icon' => 'ph-shield-check',
            'summary' => __('Integramos seguridad cloud, deteccion de amenazas y cumplimiento dentro del modelo operativo.', 'cityworks'),
            'outcome' => __('Menos exposicion, mas visibilidad y mejor respuesta.', 'cityworks'),
            'items' => array('Chronicle', 'Mandiant', 'Zero Trust', 'Cloud posture management'),
        ),
        array(
            'title' => __('Agentic Workplace Transformation', 'cityworks'),
            'icon' => 'ph-users-three',
            'summary' => __('Transformamos la colaboracion con Workspace, Gemini y agentes orientados a procesos reales.', 'cityworks'),
            'outcome' => __('Equipos mas productivos, adopcion mas clara.', 'cityworks'),
            'items' => array('Google Workspace', 'Gemini adoption', 'Agentspace', 'Workflow automation'),
        ),
    );
}

/**
 * Get strategic consulting service offers.
 */
function cityworks_get_consulting_services() {
    return array(
        array(
            'title' => __('Entrenamiento Administrativo & Soporte', 'cityworks'),
            'summary' => __('Operational enablement, admin training and support models that protect business continuity after implementation.', 'cityworks'),
            'metric' => __('Continuity', 'cityworks'),
        ),
        array(
            'title' => __('Cloud Optimization & FinOps', 'cityworks'),
            'summary' => __('Cloud spend audits, optimization roadmaps and governance practices focused on measurable savings for the client.', 'cityworks'),
            'metric' => __('Cost efficiency', 'cityworks'),
        ),
        array(
            'title' => __('Change Management', 'cityworks'),
            'summary' => __('Adoption strategy, stakeholder alignment and cultural transformation programs for digital change.', 'cityworks'),
            'metric' => __('Adoption', 'cityworks'),
        ),
    );
}

/**
 * Get featured Insights items.
 */
function cityworks_get_insights() {
    return array(
        array(
            'type' => __('Video', 'cityworks'),
            'title' => __('Google Cloud modernization briefing', 'cityworks'),
            'summary' => __('A practical overview for executive teams planning cloud, data and AI priorities.', 'cityworks'),
            'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-10.jpg',
        ),
        array(
            'type' => __('Case Study', 'cityworks'),
            'title' => __('Cloud migration operating model', 'cityworks'),
            'summary' => __('How to align delivery, security and financial governance during migration.', 'cityworks'),
            'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-3.jpg',
        ),
        array(
            'type' => __('Event', 'cityworks'),
            'title' => __('AI adoption workshop for business leaders', 'cityworks'),
            'summary' => __('Hands-on sessions for identifying high-value AI workflows.', 'cityworks'),
            'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-5.jpg',
        ),
        array(
            'type' => __('Whitepaper', 'cityworks'),
            'title' => __('FinOps checklist for Google Cloud', 'cityworks'),
            'summary' => __('A compact guide for discovering waste, rightsizing workloads and improving forecasting.', 'cityworks'),
            'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-highlights.png',
        ),
    );
}

/**
 * Get innovation timeline items.
 */
function cityworks_get_timeline() {
    return array(
        array('year' => '2021', 'title' => __('Cloud practice expansion', 'cityworks'), 'summary' => __('CityWorks strengthens its regional Google Cloud delivery foundation.', 'cityworks')),
        array('year' => '2024', 'title' => __('AI and data acceleration', 'cityworks'), 'summary' => __('New programs around Vertex AI, data platforms and automation.', 'cityworks')),
        array('year' => '2026', 'title' => __('Priority Plays 2026', 'cityworks'), 'summary' => __('Focused plays across AI, Data, Infrastructure, Security and Agentic Workplace Transformation.', 'cityworks')),
    );
}

/**
 * Get team profile placeholders prepared for Google badges.
 */
function cityworks_get_team_profiles() {
    $team_posts = get_posts(array(
        'post_type'      => 'team_member',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
    ));

    if (!empty($team_posts)) {
        $fallback_images = array(
            CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-2.jpg',
            CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-3.jpg',
            CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-5.jpg',
        );

        return array_map(function ($post, $index) use ($fallback_images) {
            $role = get_post_meta($post->ID, 'role', true);
            $role = $role ? $role : get_post_meta($post->ID, 'team_role', true);
            $role = $role ? $role : wp_strip_all_tags(get_the_excerpt($post));
            $role = $role ? $role : wp_trim_words(wp_strip_all_tags($post->post_content), 18, '');
            $role = $role ? $role : __('CityWorks team member', 'cityworks');
            $badge = get_post_meta($post->ID, 'google_badge', true);
            $image = get_the_post_thumbnail_url($post, 'medium_large');

            return array(
                'name'  => get_the_title($post),
                'role'  => $role,
                'badge' => $badge ? $badge : __('Google Cloud Certified', 'cityworks'),
                'image' => $image ? $image : $fallback_images[$index % count($fallback_images)],
            );
        }, $team_posts, array_keys($team_posts));
    }

    return array(
        array('name' => __('Cloud Strategy Team', 'cityworks'), 'role' => __('Executive advisory and solution architecture', 'cityworks'), 'badge' => __('Google Cloud Partner', 'cityworks'), 'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-2.jpg'),
        array('name' => __('Data & AI Team', 'cityworks'), 'role' => __('Analytics, AI adoption and automation delivery', 'cityworks'), 'badge' => __('Google Cloud Certified', 'cityworks'), 'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-3.jpg'),
        array('name' => __('Workspace Transformation Team', 'cityworks'), 'role' => __('Change management, enablement and support', 'cityworks'), 'badge' => __('Google Workspace Partner', 'cityworks'), 'image' => CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-5.jpg'),
    );
}

/**
 * Academy placeholder data. LMS/subdomain implementation is intentionally deferred.
 */
function cityworks_get_academy_placeholder() {
    return array(
        'title' => __('CityWorks Academy', 'cityworks'),
        'summary' => __('Academy is reserved for a future dedicated learning experience. For now, this page keeps the IA, menu and categories ready without launching an LMS.', 'cityworks'),
        'categories' => array(__('AI', 'cityworks'), __('Data', 'cityworks'), __('Infrastructure', 'cityworks'), __('Security', 'cityworks'), __('Workspace', 'cityworks')),
        'levels' => array(__('Foundational', 'cityworks'), __('Professional', 'cityworks'), __('Certification-ready', 'cityworks')),
    );
}

/**
 * Get case studies
 */
function cityworks_get_case_studies() {
    $case_posts = get_posts(array(
        'post_type'      => 'case_study',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'DESC',
    ));

    if (!empty($case_posts)) {
        return array_map(function($post) {
            return array(
                'title'    => get_the_title($post),
                'industry' => get_post_meta($post->ID, 'industry', true) ?: __('Case Study', 'cityworks'),
                'problem'  => get_post_meta($post->ID, 'problem', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 18),
                'solution' => get_post_meta($post->ID, 'solution', true) ?: get_the_excerpt($post),
                'result'   => get_post_meta($post->ID, 'result', true) ?: __('View the full transformation story.', 'cityworks'),
                'metrics'  => array_filter(array_map('trim', explode(',', get_post_meta($post->ID, 'metrics', true)))),
                'image'    => get_the_post_thumbnail_url($post, 'cityworks-case') ?: '',
                'link'     => get_permalink($post),
            );
        }, $case_posts);
    }

    return array(
        array(
            'title'       => 'Cloud Migration for Major Latin American Bank',
            'industry'   => 'Financial Services',
            'problem'    => 'Legacy infrastructure causing high costs and slow deployments.',
            'solution'   => 'Migrated 200+ workloads to GKE with Terraform automation.',
            'result'     => '38% cost reduction, 60% faster deployments.',
            'metrics'    => array('200+ workloads', '38% savings', '60% faster'),
            'image'      => '',
        ),
        array(
            'title'       => 'AI-Powered Medical Imaging Platform',
            'industry'   => 'Healthcare',
            'problem'    => 'Radiologists overloaded, manual analysis time-consuming.',
            'solution'   => 'Built Vertex AI pipeline for automated diagnosis assistance.',
            'result'     => '99.9% accuracy, 10x faster analysis.',
            'metrics'    => array('99.9% accuracy', '10x faster', '50k+ scans/month'),
            'image'      => '',
        ),
        array(
            'title'       => 'Real-Time Retail Analytics',
            'industry'   => 'Retail',
            'problem'    => 'Disconnected data silos preventing real-time insights.',
            'solution'   => 'Implemented BigQuery + Looker analytics platform.',
            'result'     => '60% faster inventory turns, $2M saved annually.',
            'metrics'    => array('60% faster', '$2M saved', '1M+ daily transactions'),
            'image'      => '',
        ),
    );
}

/**
 * Get contact info
 */
function cityworks_get_contact_info() {
    return array(
        'usa' => array(
            'name'    => 'CityWorks USA, LLC',
            'address' => '3801 PGA Blvd. Palm Beach Gardens, FL 33410',
            'phone'   => '1-561-772-3033',
        ),
        'dominican' => array(
            'name'    => 'CityWorks SRL',
            'address' => 'Citi Tower, Ave. Winston Churchill, Piso #17. Distrito Nacional, República Dominicana',
            'phone'   => '(809)-332-1603',
        ),
        'colombia' => array(
            'name'    => 'CityWorks Colombia SAS',
            'address' => 'Calle 81 #11-08 Bogotá – Colombia',
            'phone'   => '',
        ),
        'el_salvador' => array(
            'name'    => 'CityWorks El Salvador',
            'address' => 'Presidente Plaza, Edificio Google. Av. Final, Piso 8, San Salvador',
            'phone'   => '',
        ),
        'email'  => 'marketing@city.works',
        'social' => array(
            'instagram' => 'https://www.instagram.com/city.works',
            'linkedin'  => 'https://www.linkedin.com/company/city-works-usa-llc/about/',
        ),
    );
}

/**
 * Sanitize contact form data
 */
function cityworks_sanitize_contact($data) {
    $clean = array();
    $clean['name']    = sanitize_text_field($data['name'] ?? '');
    $clean['email']   = sanitize_email($data['email'] ?? '');
    $clean['message'] = sanitize_textarea_field($data['message'] ?? '');
    return $clean;
}

/**
 * Pagination
 */
function cityworks_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'  => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $wp_query->max_num_pages,
        'type'    => 'list',
        'prev_text' => '← ' . __('Previous', 'cityworks'),
        'next_text' => __('Next', 'cityworks') . ' →',
    ));
}

/**
 * Breadcrumbs
 */
function cityworks_breadcrumbs() {
    if (is_front_page()) return;
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<div class="container">';
    echo '<a href="' . home_url('/') . '">' . __('Home', 'cityworks') . '</a>';
    
    if (is_category() || is_single()) {
        echo ' <span class="separator">/</span> ';
        the_category(', ');
        if (is_single()) {
            echo ' <span class="separator">/</span> ';
            the_title('<span class="current">', '</span>');
        }
    } elseif (is_page()) {
        echo ' <span class="separator">/</span> ';
        the_title('<span class="current">', '</span>');
    } elseif (is_search()) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . get_search_query() . '</span>';
    }
    
    echo '</div></nav>';
}
