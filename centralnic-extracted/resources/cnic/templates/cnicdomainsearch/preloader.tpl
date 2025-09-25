<!-- Initial Loading Skeleton - positioned absolutely to overlay search-engine -->
<div class="initial-loading-skeleton" id="initialLoadingSkeleton" style="
    position: absolute; 
    top: 0; 
    left: 0; 
    right: 0; 
    z-index: 10; 
    backdrop-filter: blur(30px);
    -webkit-backdrop-filter: blur(30px);
    min-height: 500px; 
    max-width: 1200px; 
    margin: 0 auto;
    opacity: 1;
    transition: opacity 0.5s cubic-bezier(0.4, 0.0, 0.2, 1), backdrop-filter 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
">
    <!-- Search Input Skeleton -->
    <div class="skeleton-search-container"
        style="margin-bottom: 30px; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div class="skeleton-search-box"
            style="display: flex; gap: 12px; align-items: center; max-width: 600px; margin: 0 auto;">
            <div class="skeleton-input"
                style="flex: 1; height: 45px; background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 6px;">
            </div>
            <div class="skeleton-button"
                style="width: 120px; height: 45px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 6px;">
            </div>
        </div>
    </div>

    <!-- Tabs Skeleton -->
    <div class="skeleton-tabs"
        style="display: flex; margin-bottom: 20px; gap: 2px; background: #f8f9fa; border-radius: 8px; padding: 4px;">
        <div class="skeleton-tab active"
            style="flex: 1; height: 40px; background: linear-gradient(90deg, #fff 25%, #f8f9fa 50%, #fff 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 6px; margin: 0 2px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        </div>
        <div class="skeleton-tab"
            style="flex: 1; height: 40px; background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 6px; margin: 0 2px;">
        </div>
        <div class="skeleton-tab"
            style="flex: 1; height: 40px; background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 6px; margin: 0 2px;">
        </div>
    </div>

    <!-- Content Area Skeleton -->
    <div class="skeleton-content"
        style="background: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <!-- Spotlight TLDs Skeleton -->
        <div class="skeleton-spotlight" style="margin-bottom: 25px;">
            <div class="skeleton-spotlight-title"
                style="height: 24px; width: 200px; background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 4px; margin-bottom: 15px;">
            </div>
            <div class="skeleton-spotlight-items" style="display: flex; flex-wrap: wrap; gap: 10px;">
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
                <div class="skeleton-tld-item"
                    style="height: 32px; width: 80px; background: linear-gradient(90deg, #e8f4fd 25%, #d1e7fa 50%, #e8f4fd 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 16px;">
                </div>
            </div>
        </div>

        <!-- Search Info Skeleton -->
        <div class="skeleton-info" style="margin-top: 20px;">
            <div class="skeleton-info-text"
                style="height: 18px; width: 300px; background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 200px 100%; animation: skeletonShimmer 1.5s infinite; border-radius: 4px;">
            </div>
        </div>
    </div>
</div>

<!-- Inline CSS for immediate loading -->
<style>
    @keyframes skeletonShimmer {
        0% {
            background-position: -200px 0;
        }

        100% {
            background-position: calc(200px + 100%) 0;
        }
    }

    .initial-loading-skeleton {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .initial-loading-skeleton.hidden {
        opacity: 0;
        backdrop-filter: blur(0px);
        -webkit-backdrop-filter: blur(0px);
        pointer-events: none;
    }

    @media (prefers-reduced-motion: reduce) {

        .skeleton-input,
        .skeleton-button,
        .skeleton-tab,
        .skeleton-spotlight-title,
        .skeleton-tld-item,
        .skeleton-info-text {
            animation: none;
        }
    }
</style>

<script>
    (function() {
        'use strict';

        function hidePreloader() {
            const skeleton = document.getElementById('initialLoadingSkeleton');
            const searchEngine = document.querySelector('search-engine');

            if (!skeleton) return;

            // Show search engine and hide skeleton simultaneously
            if (searchEngine) searchEngine.style.opacity = '1';
            skeleton.classList.add('hidden');

            // Remove skeleton after transition
            setTimeout(() => skeleton.remove(), 550);
        }

        function waitForComponent() {
            // Simple check: is custom element defined?
            if (customElements.get('search-engine')) {
                hidePreloader();
            } else {
                // Check again in 100ms
                setTimeout(waitForComponent, 100);
            }
        }

        // Start immediately or wait for DOM
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', waitForComponent);
        } else {
            waitForComponent();
        }

        // Fallback timeout
        setTimeout(hidePreloader, 5000);
    })();
</script>