<?php
/**
 * Theme 2026 - ACF to Component Data Adapter
 *
 * Maps ACF flexible_content keys (utils/acf-*.php) to presentation
 * component keys (components/theme-2026/...) 1:1 with Figma.
 *
 * Figma sources:
 *  HOME 132:1005, L1 133:1481, L2 132:1032
 *  Foundations 66:414 colours, 66:415 Instrument Sans
 *
 * @package Bootscore Child
 * @version 1.1.0 (2026-figma-11)
 */

defined('ABSPATH') || exit;

/**
 * Resolve ACF image value (ID | array | URL) to URL string.
 */
function t26_resolve_image_url($value)
{
  if (empty($value)) {
    return '';
  }
  if (is_numeric($value)) {
    $url = wp_get_attachment_image_url((int) $value, 'full');
    return $url ? $url : '';
  }
  if (is_array($value)) {
    if (!empty($value['url'])) {
      return $value['url'];
    }
    if (!empty($value['ID'])) {
      $url = wp_get_attachment_image_url((int) $value['ID'], 'full');
      return $url ? $url : '';
    }
    if (!empty($value['id'])) {
      $url = wp_get_attachment_image_url((int) $value['id'], 'full');
      return $url ? $url : '';
    }
    return '';
  }
  if (is_string($value)) {
    return $value;
  }
  return '';
}

/**
 * Build hero stats from ACF individual fields + repeater.
 */
function t26_build_hero_stats($data)
{
  if (!empty($data['stats']) && is_array($data['stats'])) {
    $out = array();
    foreach ($data['stats'] as $row) {
      if (!empty($row['value']) || !empty($row['label'])) {
        $out[] = array(
          'value' => isset($row['value']) ? $row['value'] : '',
          'label' => isset($row['label']) ? $row['label'] : '',
        );
      }
    }
    if (!empty($out)) {
      return $out;
    }
  }
  $pairs = array(
    array(isset($data['stat_1_value']) ? $data['stat_1_value'] : null, isset($data['stat_1_label']) ? $data['stat_1_label'] : null),
    array(isset($data['stat_2_value']) ? $data['stat_2_value'] : null, isset($data['stat_2_label']) ? $data['stat_2_label'] : null),
    array(isset($data['stat_3_value']) ? $data['stat_3_value'] : null, isset($data['stat_3_label']) ? $data['stat_3_label'] : null),
    array(isset($data['stat_4_value']) ? $data['stat_4_value'] : null, isset($data['stat_4_label']) ? $data['stat_4_label'] : null),
  );
  $has = false;
  foreach ($pairs as $p) {
    if (!empty($p[0]) || !empty($p[1])) {
      $has = true;
      break;
    }
  }
  if ($has) {
    $out = array();
    foreach ($pairs as $p) {
      $out[] = array('value' => $p[0], 'label' => $p[1]);
    }
    return $out;
  }
  return null;
}

/**
 * Normalize shared Hero data.
 * ACF: badge/title/subtitle_italic/description/cta_primary_text/url/cta_secondary__star/background_type/background_image/stat_*
 * PHP: category/title/subtitle/description/primary_text/url/secondary_star/variant/photo_url/stats{value,label}
 */
function t26_normalize_hero($data)
{
  $data = is_array($data) ? $data : array();
  $out = $data;

  if (isset($data['badge']) && !isset($data['category'])) {
    $out['category'] = $data['badge'];
  }
  if (isset($data['subtitle_italic']) && !isset($data['subtitle'])) {
    $out['subtitle'] = $data['subtitle_italic'];
  }
  if (isset($data['cta_primary_text']) && !isset($data['primary_text'])) {
    $out['primary_text'] = $data['cta_primary_text'];
  }
  if (isset($data['cta_primary_url']) && !isset($data['primary_url'])) {
    $out['primary_url'] = $data['cta_primary_url'];
  }
  if (isset($data['cta_secondary_text']) && !isset($data['secondary_text'])) {
    $out['secondary_text'] = $data['cta_secondary_text'];
  }
  if (isset($data['cta_secondary_url']) && !isset($data['secondary_url'])) {
    $out['secondary_url'] = $data['cta_secondary_url'];
  }
  if (isset($data['background_type']) && !isset($data['variant'])) {
    $out['variant'] = $data['background_type'];
  }
  if (isset($data['background_image']) && empty($data['photo_url'])) {
    $out['photo_url'] = t26_resolve_image_url($data['background_image']);
  }
  if (isset($data['hero_variant'])) {
    $out['hero_variant'] = $data['hero_variant'];
  }
  $stats = t26_build_hero_stats($data);
  if (is_array($stats)) {
    $out['stats'] = $stats;
  }
  return $out;
}

/**
 * Normalize Home StartingPoint.
 * ACF: cards{title,description,link_url,target_id}
 * PHP: items{title,description,target,tag,icon}
 */
function t26_normalize_starting_point($data)
{
  $data = is_array($data) ? $data : array();
  if (!empty($data['items'])) {
    return $data;
  }
  if (empty($data['cards']) || !is_array($data['cards'])) {
    return $data;
  }
  $fallback_tags = array('Compliance & Audit', 'EU Directives', 'Advisory & Strategy', 'Technical Testing');
  $fallback_icons = array('shield-check', 'scale', 'user-shield', 'terminal');
  $items = array();
  foreach ($data['cards'] as $i => $c) {
    $target = !empty($c['target_id']) ? $c['target_id'] : '';
    if (empty($target) && !empty($c['link_url'])) {
      $target = ltrim($c['link_url'], '#');
      $target = sanitize_title($target);
    }
    $items[] = array(
      'title'       => isset($c['title']) ? $c['title'] : '',
      'description' => isset($c['description']) ? $c['description'] : '',
      'target'      => $target !== '' ? $target : 'service-' . ($i + 1),
      'tag'         => isset($c['tag']) ? $c['tag'] : $fallback_tags[$i % count($fallback_tags)],
      'icon'        => isset($c['icon']) ? $c['icon'] : $fallback_icons[$i % count($fallback_icons)],
    );
  }
  $data['items'] = $items;
  return $data;
}

/**
 * Normalize Home ServicesGrid.
 * ACF: advisory_title/blurb/btn_* + services{icon,title,description,url}
 * PHP: callout{badge,title,description,cta_text,cta_link,highlights} + services{id,tag,features,link}
 */
function t26_normalize_services_grid($data)
{
  $data = is_array($data) ? $data : array();
  if (!isset($data['callout'])) {
    $has_advisory = isset($data['advisory_title']) || isset($data['advisory_blurb']) || isset($data['advisory_btn_text']);
    if ($has_advisory) {
      $data['callout'] = array(
        'badge'       => 'ADVISORY CONSULTATION',
        'title'       => isset($data['advisory_title']) ? $data['advisory_title'] : 'Not sure where you stand?',
        'description' => isset($data['advisory_blurb']) ? $data['advisory_blurb'] : '',
        'cta_text'    => isset($data['advisory_btn_text']) ? $data['advisory_btn_text'] : 'Request a scoping call',
        'cta_link'    => isset($data['advisory_btn_url']) ? $data['advisory_btn_url'] : '#contact-cta',
        'highlights'  => array(
          'Direct QSA / Lead Assessor dialogue',
          'Realistic scope-reduction strategies',
          'No junior delegation or sales reps',
        ),
      );
    }
  }
  if (!empty($data['services']) && is_array($data['services'])) {
    $needs_map = false;
    foreach ($data['services'] as $s) {
      if (!isset($s['id']) || !isset($s['link'])) {
        $needs_map = true;
        break;
      }
    }
    if ($needs_map) {
      $mapped = array();
      foreach ($data['services'] as $i => $s) {
        $mapped[] = array(
          'id'          => isset($s['id']) ? $s['id'] : sanitize_title(isset($s['title']) ? $s['title'] : 'service-' . ($i + 1)),
          'title'       => isset($s['title']) ? $s['title'] : '',
          'tag'         => isset($s['tag']) ? $s['tag'] : '',
          'description' => isset($s['description']) ? $s['description'] : '',
          'features'    => isset($s['features']) ? $s['features'] : array(),
          'link'        => isset($s['link']) ? $s['link'] : (isset($s['url']) ? $s['url'] : '#contact-cta'),
          'icon'        => isset($s['icon']) ? $s['icon'] : 'shield',
        );
      }
      $data['services'] = $mapped;
    }
  }
  return $data;
}

/**
 * Normalize Home ProofPoints.
 * ACF: items{number,label,description}
 * PHP: pillars{stat,stat_label,title,subtitle,description,highlights,icon}
 */
function t26_normalize_proof_points($data)
{
  $data = is_array($data) ? $data : array();
  if (!empty($data['pillars'])) {
    return $data;
  }
  if (empty($data['items']) || !is_array($data['items'])) {
    return $data;
  }
  $pillars = array();
  foreach ($data['items'] as $it) {
    $pillars[] = array(
      'stat'       => isset($it['number']) ? $it['number'] : '',
      'stat_label' => isset($it['label']) ? $it['label'] : '',
      'title'      => isset($it['label']) ? $it['label'] : '',
      'subtitle'   => '',
      'description' => isset($it['description']) ? $it['description'] : '',
      'highlights' => array(),
      'icon'       => 'award',
    );
  }
  $data['pillars'] = $pillars;
  return $data;
}

/**
 * Normalize Home CredentialsWall.
 * ACF: highlight_badge/title/text + logos{name,image}
 * PHP: neon_banner{tag,title,desc,cta_url} + accreditations{code,name,authority,category}
 */
function t26_normalize_credentials_wall($data)
{
  $data = is_array($data) ? $data : array();
  if (!isset($data['neon_banner']) && (isset($data['highlight_badge']) || isset($data['highlight_title']) || isset($data['highlight_text']))) {
    $data['neon_banner'] = array(
      'tag'     => isset($data['highlight_badge']) ? $data['highlight_badge'] : 'OFFICIALLY QUALIFIED',
      'title'   => isset($data['highlight_title']) ? $data['highlight_title'] : 'PCI DSS v4.0.1 Ready',
      'desc'    => isset($data['highlight_text']) ? $data['highlight_text'] : '',
      'cta_url' => '#contact-cta',
    );
  }
  if (empty($data['accreditations']) && !empty($data['logos']) && is_array($data['logos'])) {
    $acc = array();
    foreach ($data['logos'] as $l) {
      $acc[] = array(
        'code'      => isset($l['name']) ? $l['name'] : '',
        'name'      => isset($l['name']) ? $l['name'] : '',
        'authority' => '',
        'category'  => '',
        'image'     => isset($l['image']) ? t26_resolve_image_url($l['image']) : '',
      );
    }
    $data['accreditations'] = $acc;
  }
  return $data;
}

/**
 * Normalize Testimonials single -> items.
 * ACF: quote/author/role/company (+badge/title)
 * PHP: items{quote,author,role,company,avatar}
 */
function t26_normalize_testimonials($data)
{
  $data = is_array($data) ? $data : array();
  if (!empty($data['items'])) {
    return $data;
  }
  if (!empty($data['quote'])) {
    $data['items'] = array(
      array(
        'quote'   => $data['quote'],
        'author'  => isset($data['author']) ? $data['author'] : '',
        'role'    => isset($data['role']) ? $data['role'] : '',
        'company' => isset($data['company']) ? $data['company'] : '',
        'avatar'  => '',
      ),
    );
  }
  return $data;
}

/**
 * Normalize CaseStudies persona_badge/metric_badge -> badge/metric.
 */
function t26_normalize_case_studies($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['items']) || !is_array($data['items'])) {
    return $data;
  }
  $needs = false;
  foreach ($data['items'] as $it) {
    if (isset($it['persona_badge']) || isset($it['metric_badge'])) {
      $needs = true;
      break;
    }
  }
  if (!$needs) {
    return $data;
  }
  $mapped = array();
  foreach ($data['items'] as $it) {
    $mapped[] = array(
      'badge'     => isset($it['badge']) ? $it['badge'] : (isset($it['persona_badge']) ? $it['persona_badge'] : ''),
      'metric'    => isset($it['metric']) ? $it['metric'] : (isset($it['metric_badge']) ? $it['metric_badge'] : ''),
      'situation' => isset($it['situation']) ? $it['situation'] : '',
      'outcome'   => isset($it['outcome']) ? $it['outcome'] : '',
      'link'      => isset($it['link']) ? $it['link'] : '#contact-cta',
      'title'     => isset($it['title']) ? $it['title'] : '',
    );
  }
  $data['items'] = $mapped;
  return $data;
}

/**
 * Normalize CTA trust_badge_1/2/3 strings -> trust_badges[] + button_text.
 * Figma 237:1619: Free 30-min scoping call / No obligation / Senior assessor not sales.
 */
function t26_normalize_cta($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['trust_badges'])) {
    $tb = array();
    foreach (array('trust_badge_1', 'trust_badge_2', 'trust_badge_3') as $k) {
      if (!empty($data[$k])) {
        $tb[] = array('icon' => 'check', 'title' => $data[$k], 'desc' => '');
      }
    }
    if (!empty($tb)) {
      $data['trust_badges'] = $tb;
    }
  }
  return $data;
}

/**
 * Normalize Specialists members role_credentials/specialization(string) -> role/specializations[].
 */
function t26_normalize_specialists($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['members']) || !is_array($data['members'])) {
    return $data;
  }
  $mapped = array();
  foreach ($data['members'] as $m) {
    $spec = array();
    if (isset($m['specializations']) && is_array($m['specializations'])) {
      $spec = $m['specializations'];
    } elseif (!empty($m['specialization'])) {
      $spec = array_map('trim', explode(',', $m['specialization']));
    }
    $mapped[] = array(
      'name'            => isset($m['name']) ? $m['name'] : '',
      'role'            => isset($m['role']) ? $m['role'] : (isset($m['role_credentials']) ? $m['role_credentials'] : ''),
      'title'           => isset($m['title']) ? $m['title'] : (isset($m['specialization']) ? $m['specialization'] : ''),
      'photo'           => isset($m['photo']) ? $m['photo'] : '',
      'initials'        => isset($m['initials']) ? $m['initials'] : '',
      'specializations' => $spec,
      'bio'             => isset($m['bio']) ? $m['bio'] : '',
    );
  }
  $data['members'] = $mapped;
  return $data;
}

/**
 * Normalize RelatedServices link_url -> link.
 */
function t26_normalize_related($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['items']) || !is_array($data['items'])) {
    return $data;
  }
  $mapped = array();
  foreach ($data['items'] as $it) {
    $mapped[] = array(
      'category'    => isset($it['category']) ? $it['category'] : '',
      'title'       => isset($it['title']) ? $it['title'] : '',
      'description' => isset($it['description']) ? $it['description'] : '',
      'link'        => isset($it['link']) ? $it['link'] : (isset($it['link_url']) ? $it['link_url'] : '#'),
      'link_text'   => isset($it['link_text']) ? $it['link_text'] : 'Read more',
    );
  }
  $data['items'] = $mapped;
  return $data;
}

/**
 * Normalize L1 WhoItsFor cards -> items.
 */
function t26_normalize_who_its_for($data)
{
  $data = is_array($data) ? $data : array();
  if (!empty($data['items'])) {
    return $data;
  }
  if (empty($data['cards']) || !is_array($data['cards'])) {
    return $data;
  }
  $items = array();
  foreach ($data['cards'] as $c) {
    $items[] = array(
      'title'       => isset($c['title']) ? $c['title'] : '',
      'description' => isset($c['description']) ? $c['description'] : '',
      'points'      => array(),
      'tag'         => '',
      'icon'        => isset($c['icon']) ? $c['icon'] : 'shield',
    );
  }
  $data['items'] = $items;
  if (isset($data['crystal_image']) && !isset($data['crystal'])) {
    $data['crystal'] = t26_resolve_image_url($data['crystal_image']);
  }
  return $data;
}

/**
 * Normalize L1 ServicesList services url -> link_url/link_text/icon_type.
 */
function t26_normalize_services_list($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['services']) || !is_array($data['services'])) {
    return $data;
  }
  $mapped = array();
  foreach ($data['services'] as $s) {
    $mapped[] = array(
      'title'       => isset($s['title']) ? $s['title'] : '',
      'tag'         => isset($s['tag']) ? $s['tag'] : '',
      'description' => isset($s['description']) ? $s['description'] : '',
      'link_url'    => isset($s['link_url']) ? $s['link_url'] : (isset($s['url']) ? $s['url'] : (isset($s['link']) ? $s['link'] : '#contact-cta')),
      'link_text'   => isset($s['link_text']) ? $s['link_text'] : 'Read more',
      'icon_type'   => isset($s['icon_type']) ? $s['icon_type'] : (isset($s['icon']) ? $s['icon'] : 'shield-roc'),
    );
  }
  $data['services'] = $mapped;
  return $data;
}

/**
 * Normalize L2 WhoServiceIsFor criteria_1/2/3 -> criteria[].
 */
function t26_normalize_who_service_is_for($data)
{
  $data = is_array($data) ? $data : array();
  $key = !empty($data['cards']) ? 'cards' : (!empty($data['items']) ? 'items' : null);
  if (!$key) {
    return $data;
  }
  $mapped = array();
  foreach ($data[$key] as $c) {
    $criteria = array();
    if (!empty($c['criteria']) && is_array($c['criteria'])) {
      $criteria = $c['criteria'];
    } else {
      foreach (array('criteria_1', 'criteria_2', 'criteria_3') as $k) {
        if (!empty($c[$k])) {
          $criteria[] = $c[$k];
        }
      }
    }
    $mapped[] = array(
      'icon'        => isset($c['icon']) ? $c['icon'] : 'shield',
      'badge'       => isset($c['badge']) ? $c['badge'] : '',
      'title'       => isset($c['title']) ? $c['title'] : '',
      'description' => isset($c['description']) ? $c['description'] : '',
      'criteria'    => $criteria,
    );
  }
  $data['cards'] = $mapped;
  $data['items'] = $mapped;
  return $data;
}

/**
 * Normalize L2 Process steps step_number -> number + defaults.
 */
function t26_normalize_process($data)
{
  $data = is_array($data) ? $data : array();
  $key = !empty($data['steps']) ? 'steps' : (!empty($data['stages']) ? 'stages' : (!empty($data['items']) ? 'items' : null));
  if (!$key) {
    return $data;
  }
  $mapped = array();
  foreach ($data[$key] as $i => $s) {
    $num = isset($s['number']) ? $s['number'] : (isset($s['step_number']) ? $s['step_number'] : str_pad($i + 1, 2, '0', STR_PAD_LEFT));
    $mapped[] = array(
      'number'       => $num,
      'timeframe'    => isset($s['timeframe']) ? $s['timeframe'] : '',
      'phase'        => isset($s['phase']) ? $s['phase'] : '',
      'title'        => isset($s['title']) ? $s['title'] : '',
      'description'  => isset($s['description']) ? $s['description'] : '',
      'deliverables' => isset($s['deliverables']) ? $s['deliverables'] : array(),
    );
  }
  $data['steps'] = $mapped;
  $data['stages'] = $mapped;
  $data['items'] = $mapped;
  return $data;
}

/**
 * Normalize L2 CaseOutcomes flat industry/... -> metadata[].
 */
function t26_normalize_case_outcomes($data)
{
  $data = is_array($data) ? $data : array();
  if (!empty($data['metadata'])) {
    return $data;
  }
  $map = array(
    'industry' => 'Industry',
    'region'   => 'Region',
    'scale'    => 'Scale',
    'scope'    => 'Scope',
    'duration' => 'Duration',
    'outcome'  => 'Outcome',
  );
  $has = false;
  foreach ($map as $k => $label) {
    if (!empty($data[$k])) {
      $has = true;
      break;
    }
  }
  if ($has) {
    $meta = array();
    foreach ($map as $k => $label) {
      if (!empty($data[$k])) {
        $meta[] = array('label' => $label, 'value' => $data[$k], 'sub' => '');
      }
    }
    $data['metadata'] = $meta;
  }
  if (!empty($data['quote_author']) && empty($data['author'])) {
    $data['author'] = $data['quote_author'];
  }
  return $data;
}

/**
 * Normalize L2 Resources items file_url/button_text -> download_url/btn_text.
 */
function t26_normalize_resources($data)
{
  $data = is_array($data) ? $data : array();
  if (empty($data['items']) || !is_array($data['items'])) {
    return $data;
  }
  $mapped = array();
  foreach ($data['items'] as $it) {
    $mapped[] = array(
      'tag'          => isset($it['tag']) ? $it['tag'] : 'Resource',
      'title'        => isset($it['title']) ? $it['title'] : '',
      'description'  => isset($it['description']) ? $it['description'] : '',
      'format'       => isset($it['format']) ? $it['format'] : 'PDF',
      'size'         => isset($it['size']) ? $it['size'] : '',
      'pages'        => isset($it['pages']) ? $it['pages'] : '',
      'download_url' => isset($it['download_url']) ? $it['download_url'] : (isset($it['file_url']) ? $it['file_url'] : '#'),
      'btn_text'     => isset($it['btn_text']) ? $it['btn_text'] : (isset($it['button_text']) ? $it['button_text'] : 'Download PDF'),
    );
  }
  $data['items'] = $mapped;
  $data['resources'] = $mapped;
  return $data;
}

/**
 * Master dispatcher: normalize by layout name.
 */
function t26_normalize_section_data($layout, $data)
{
  $data = is_array($data) ? $data : array();
  switch ($layout) {
    case 'hero':
      return t26_normalize_hero($data);
    case 'starting_point':
      return t26_normalize_starting_point($data);
    case 'services_grid':
      return t26_normalize_services_grid($data);
    case 'proof_points':
      return t26_normalize_proof_points($data);
    case 'credentials_wall':
      return t26_normalize_credentials_wall($data);
    case 'testimonials':
      return t26_normalize_testimonials($data);
    case 'case_studies':
      return t26_normalize_case_studies($data);
    case 'faq':
      return $data;
    case 'cta_section':
      return t26_normalize_cta($data);
    case 'specialists':
      return t26_normalize_specialists($data);
    case 'related_services':
      return t26_normalize_related($data);
    case 'who_its_for':
      return t26_normalize_who_its_for($data);
    case 'services_list':
      return t26_normalize_services_list($data);
    case 'who_service_is_for':
      return t26_normalize_who_service_is_for($data);
    case 'overview':
      if (isset($data['diagram_image'])) {
        $data['diagram'] = t26_resolve_image_url($data['diagram_image']);
      }
      return $data;
    case 'process':
      return t26_normalize_process($data);
    case 'case_outcomes':
      return t26_normalize_case_outcomes($data);
    case 'resources':
      return t26_normalize_resources($data);
    default:
      return $data;
  }
}
