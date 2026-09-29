<?php
/**
 * Component Loader for Theme 2026
 *
 * Automatically loads all shared, home, L1, and L2 presentation components
 * for the 2026 redesign templates.
 *
 * @package Bootscore Child
 * @version 1.0.0 (2026)
 */

defined('ABSPATH') || exit;

/**
 * -----------------------------------------------------------------------------
 * Shared Components
 * -----------------------------------------------------------------------------
 */
// Hero
if (file_exists(__DIR__ . '/shared/Hero/hero.php')) {
    require_once __DIR__ . '/shared/Hero/hero.php';
} elseif (file_exists(__DIR__ . '/Hero/hero.php')) {
    require_once __DIR__ . '/Hero/hero.php';
}

// StatsBar (Figma 313:3632 / 313:4110)
if (file_exists(__DIR__ . '/shared/StatsBar/statsBar.php')) {
    require_once __DIR__ . '/shared/StatsBar/statsBar.php';
}

// Testimonials
if (file_exists(__DIR__ . '/shared/Testimonials/testimonials.php')) {
    require_once __DIR__ . '/shared/Testimonials/testimonials.php';
} elseif (file_exists(__DIR__ . '/Testimonials/testimonials.php')) {
    require_once __DIR__ . '/Testimonials/testimonials.php';
}

// Case Studies
if (file_exists(__DIR__ . '/shared/CaseStudies/caseStudies.php')) {
    require_once __DIR__ . '/shared/CaseStudies/caseStudies.php';
} elseif (file_exists(__DIR__ . '/CaseStudies/caseStudies.php')) {
    require_once __DIR__ . '/CaseStudies/caseStudies.php';
}

// FAQ
if (file_exists(__DIR__ . '/shared/Faq/faq.php')) {
    require_once __DIR__ . '/shared/Faq/faq.php';
} elseif (file_exists(__DIR__ . '/Faq/faq.php')) {
    require_once __DIR__ . '/Faq/faq.php';
}

// CTA Section
if (file_exists(__DIR__ . '/shared/CtaSection/ctaSection.php')) {
    require_once __DIR__ . '/shared/CtaSection/ctaSection.php';
} elseif (file_exists(__DIR__ . '/CtaSection/ctaSection.php')) {
    require_once __DIR__ . '/CtaSection/ctaSection.php';
}

// Specialists
if (file_exists(__DIR__ . '/shared/Specialists/specialists.php')) {
    require_once __DIR__ . '/shared/Specialists/specialists.php';
} elseif (file_exists(__DIR__ . '/Specialists/specialists.php')) {
    require_once __DIR__ . '/Specialists/specialists.php';
}

// Related Services
if (file_exists(__DIR__ . '/shared/RelatedServices/relatedServices.php')) {
    require_once __DIR__ . '/shared/RelatedServices/relatedServices.php';
} elseif (file_exists(__DIR__ . '/RelatedServices/relatedServices.php')) {
    require_once __DIR__ . '/RelatedServices/relatedServices.php';
}

// Navbar 2026 (Figma 132:1006)
if (file_exists(__DIR__ . '/shared/Navbar/navbar.php')) {
    require_once __DIR__ . '/shared/Navbar/navbar.php';
}

// Footer 2026 (Figma 313:3992)
if (file_exists(__DIR__ . '/shared/Footer/footer.php')) {
    require_once __DIR__ . '/shared/Footer/footer.php';
}

/**
 * -----------------------------------------------------------------------------
 * Home Specific Components
 * -----------------------------------------------------------------------------
 */
// Starting Point
if (file_exists(__DIR__ . '/home/StartingPoint/startingPoint.php')) {
    require_once __DIR__ . '/home/StartingPoint/startingPoint.php';
} elseif (file_exists(__DIR__ . '/StartingPoint/startingPoint.php')) {
    require_once __DIR__ . '/StartingPoint/startingPoint.php';
}

// Services Grid
if (file_exists(__DIR__ . '/home/ServicesGrid/servicesGrid.php')) {
    require_once __DIR__ . '/home/ServicesGrid/servicesGrid.php';
} elseif (file_exists(__DIR__ . '/ServicesGrid/servicesGrid.php')) {
    require_once __DIR__ . '/ServicesGrid/servicesGrid.php';
}

// Proof Points
if (file_exists(__DIR__ . '/home/ProofPoints/proofPoints.php')) {
    require_once __DIR__ . '/home/ProofPoints/proofPoints.php';
} elseif (file_exists(__DIR__ . '/ProofPoints/proofPoints.php')) {
    require_once __DIR__ . '/ProofPoints/proofPoints.php';
}

// Credentials Wall
if (file_exists(__DIR__ . '/home/CredentialsWall/credentialsWall.php')) {
    require_once __DIR__ . '/home/CredentialsWall/credentialsWall.php';
} elseif (file_exists(__DIR__ . '/CredentialsWall/credentialsWall.php')) {
    require_once __DIR__ . '/CredentialsWall/credentialsWall.php';
}

/**
 * -----------------------------------------------------------------------------
 * L1 Specific Components
 * -----------------------------------------------------------------------------
 */
// Who It's For
if (file_exists(__DIR__ . '/l1/WhoItsFor/whoItsFor.php')) {
    require_once __DIR__ . '/l1/WhoItsFor/whoItsFor.php';
} elseif (file_exists(__DIR__ . '/WhoItsFor/whoItsFor.php')) {
    require_once __DIR__ . '/WhoItsFor/whoItsFor.php';
}

// Services List
if (file_exists(__DIR__ . '/l1/ServicesList/servicesList.php')) {
    require_once __DIR__ . '/l1/ServicesList/servicesList.php';
} elseif (file_exists(__DIR__ . '/ServicesList/servicesList.php')) {
    require_once __DIR__ . '/ServicesList/servicesList.php';
}

/**
 * -----------------------------------------------------------------------------
 * L2 Specific Components
 * -----------------------------------------------------------------------------
 */
// Who Service Is For
if (file_exists(__DIR__ . '/l2/WhoServiceIsFor/whoServiceIsFor.php')) {
    require_once __DIR__ . '/l2/WhoServiceIsFor/whoServiceIsFor.php';
} elseif (file_exists(__DIR__ . '/WhoServiceIsFor/whoServiceIsFor.php')) {
    require_once __DIR__ . '/WhoServiceIsFor/whoServiceIsFor.php';
}

// Overview
if (file_exists(__DIR__ . '/l2/Overview/overview.php')) {
    require_once __DIR__ . '/l2/Overview/overview.php';
} elseif (file_exists(__DIR__ . '/Overview/overview.php')) {
    require_once __DIR__ . '/Overview/overview.php';
}

// Process
if (file_exists(__DIR__ . '/l2/Process/process.php')) {
    require_once __DIR__ . '/l2/Process/process.php';
} elseif (file_exists(__DIR__ . '/Process/process.php')) {
    require_once __DIR__ . '/Process/process.php';
}

// Case Outcomes
if (file_exists(__DIR__ . '/l2/CaseOutcomes/caseOutcomes.php')) {
    require_once __DIR__ . '/l2/CaseOutcomes/caseOutcomes.php';
} elseif (file_exists(__DIR__ . '/CaseOutcomes/caseOutcomes.php')) {
    require_once __DIR__ . '/CaseOutcomes/caseOutcomes.php';
}

// Resources
if (file_exists(__DIR__ . '/l2/Resources/resources.php')) {
    require_once __DIR__ . '/l2/Resources/resources.php';
} elseif (file_exists(__DIR__ . '/Resources/resources.php')) {
    require_once __DIR__ . '/Resources/resources.php';
}
