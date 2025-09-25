<div id="tabs" style="display:none">
  <ul>
    <li><a href="#tabs-1">Settings</a></li>
    <li><a href="#tabs-2">Categories</a></li>
  </ul>
  <div id="tabs-1">
    <div id="cfgaccordion" class="accordion">
      <h3>Lookup Provider</h3>
      <div class="row">
        <div class="col col-md-6">
          <p>Domain lookup provider <span id="cfglookupregistrar" style="font-weight: 600;font-size:0.8em;"></span>
            Hexonet/ISPAPI or CentralNic Reseller. <br />This is necessary to have this addon correctly running.</p>
        </div>
        <div class="col col-md-2">
          <p><a id="configureLookupProvider" class="btn btn-sm btn-default btn-block open-modal"
              href="configdomainlookup.php?action=configure" data-modal-title="Configure Lookup Provider"
              data-btn-submit-id="btnSaveLookupConfiguration" data-btn-submit-label="Save" onclick="return false;"
              data-modal-size="modal-lg">Configure</a></p>
          <p><a id="changeLookupProvider" class="btn btn-sm btn-default btn-block open-modal"
              href="configdomains.php?action=lookup-provider" data-modal-title="Choose Lookup Provider"
              onclick="return false;" data-modal-size="modal-lg">Change</a></p>
        </div>
      </div>
      <h3>By-default active Categories</h3>
      <div>
        <p>Click on the category boxes to select or deselect categories to fit your needs. The active ones (highlighted
          in orange) will be activated by default when your clients initially visit the domain search form.</p>
        <p>If you have the use for it, here a pre-configured search url. Find further available parameters documented in
          the <a class="hx"
            href="https://support.centralnicreseller.com/hc/en-gb/articles/13508150601373-WHMCS-Domain-Search-Addon"
            target="_blank">CentralNic Reseller</a> or <a class="hx"
            href="https://www.hexonet.support/hc/en-gb/articles/13655440058397-WHMCS-Domain-Search-Addon"
            target="_blank">HEXONET</a> Usage Guide.</p>
        <div id="categories" class="row1 row collapse-category">
          <div class="col col-12 col-xs-12 category-setting">
            <button class="category-button collapsed" type="button" data-toggle="collapse" data-target="#category"
              aria-expanded="false">
              <span>CATEGORIES</span><br /><i class="category fa fa-angle-up"></i>
            </button>
          </div>
          <div class="col col-12 col-xs-12">
            <div class="catcontainer"></div>
          </div>
        </div>
        <button type="button" id="savedefaultcats" class="btn btn-default">Save Changes</button>
      </div>

      <h3>Features</h3>
      <div class="feature-item-container">
        <p>This section allows for toggling the features you want to offer.</p>

        <!-- Feature item: Regular Domain Search -->
        <div class="feature-item row" data-feature="RegularSearch">
          <div class="position-column">
            <span class="position-number">#1</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-RegularSearch">Regular Domain Search</label>
            <p>This section allows for toggling the feature of performing regular domain searches.</p>
            <input id="feature-toggle-RegularSearch" disabled class="dsfeature" type="checkbox" />
          </div>
        </div>

        <!-- Feature item: Domain Transfer -->
        <div class="feature-item row" data-feature="BulkTransfers">
          <div class="position-column">
            <span class="position-number">#2</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-BulkTransfers">Domain Transfer</label>
            <p>Toggle to enable or disable the feature for domain transfers.</p>
            <input id="feature-toggle-BulkTransfers" class="dsfeature" type="checkbox" />
          </div>
        </div>

        <!-- Feature item: Domain WhoIs -->
        <div class="feature-item row" data-feature="WhoIs">
          <div class="position-column">
            <span class="position-number">#3</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-WhoIs">Domain WhoIs</label>
            <p>Enables the functionality to perform domain WhoIs lookup.</p>
            <input id="feature-toggle-WhoIs" class="dsfeature" type="checkbox" />
          </div>
        </div>

        <!-- Feature item: Domain Name Suggestions -->
        <div class="feature-item row" data-feature="Suggestions">
          <div class="position-column">
            <span class="position-number">#4</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-Suggestions">Domain Name Suggestions</label>
            <p>This setting corresponds to the flag of the Lookup Provider Settings.</p>
            <input id="feature-toggle-Suggestions" class="dsfeature" type="checkbox" />
          </div>
        </div>

        <!-- Feature item: Search Engine Home -->
        <div class="feature-item row" data-feature="Home">
          <div class="position-column">
            <span class="position-number">#5</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-Home">Search Engine Home</label>
            <p>The main page or dashboard of our search engine currently shows only the most popular and recommended
              TLDs.</p>
            <input id="feature-toggle-Home" class="dsfeature" type="checkbox" />
          </div>
        </div>

        <!-- Feature item: Aftermarket -->
        <div class="feature-item row" data-feature="Aftermarket">
          <div class="position-column">
            <span class="position-number">#6</span>
          </div>
          <div class="col col-md-1 text-right">
            <div class="button-group">
              <button class="move-button move-up" aria-label="Move Up">
                <span class="button-label">Up</span>
                <i class="fas fa-caret-up"></i>
              </button>
              <button class="move-button move-down" aria-label="Move Down">
                <i class="fas fa-caret-down"></i>
                <span class="button-label">Down</span>
              </button>
            </div>
          </div>
          <div class="col col-md-10">
            <label for="feature-toggle-Aftermarket">Aftermarket</label>
            <p>To integrate aftermarket domains, make sure to enable premium domain support. This will ensure seamless
              integration with aftermarket domains.</p>
            <input id="feature-toggle-Aftermarket" class="dsfeature" type="checkbox" />
          </div>
        </div>

      </div>

      <h3>Additional Settings</h3>
      <div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-domainTransfers" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-domainTransfers">Show Transfer Button in Search Results</label>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-containerSpotlight" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-containerSpotlight">Spotlight/Featured TLDs Container</label>
          </div>
          <div class="col col-md-6">
            <p>Add a section below the "Regular Domain Search/Transfers/Suggestions" tab to highlight top-level domains
              (TLDs)
              available for registration. This section can be called "Featured/Spotlight TLDs."<br /><a
                href="configdomains.php" style="font-weight:600;color:blue">Configure Spotlight tlds</a></p>
            </p>
          </div>
        </div>
        <!-- Premium Domains -->
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-premiumDomains" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-premiumDomains">Premium Domain Names</label>
          </div>
          <div class="col col-md-6">
            <p>Support Premium Domain Names - a global WHMCS Settings. This covers Aftermarket Premium Domains as well
              as
              Registry Premium Domains. Support of Aftermarket Domain Names is a matter of the underlying Registrar
              Module.
              You may check the settings there as well.
              <a id="linkConfigurePremiumMarkup" href="configdomains.php?action=premium-levels"
                class="btn btn-default btn-sm btn-block open-modal" data-modal-title="Configure Premium Domain Levels"
                data-btn-submit-id="btnSavePremium" data-btn-submit-label="Save">Configure</a>
            </p>
          </div>
        </div>
        <!-- Unavailable Domain Names -->
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-takenDomains" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-takenDomains">Include Taken/Unavailable Domain Names
            </label>
          </div>
          <div class="col col-md-6">
            <p>This setting allows resellers to show or hide taken/unavailable domain names by default in the search
              results. Users can still override this setting and unhide these domains by going to the advanced options
              in the search engine.</p>
            <!-- This is useful if you use our <a href="https://github.com/centralnicgroup-opensource/rtldev-middleware-whmcs-ispapi-backorder" class="btn-link hx" target="_blank">Domain Backorder Module.</a>-->
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-promotions" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-promotions">Promotions Container</label>
          </div>
          <div class="col col-md-6">
            <p>Add a Promotions section below the "Homepage/Regular Domain Search/Transfers/Suggestions" tab.</p>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-searchLogs" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-searchLogs">Search Logs</label>
          </div>
          <div class="col col-md-6">
            <p>Stay informed about your customers' search activities and their evolving needs by tracking the keywords &
              domains they search for.</p>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-additionalScroll" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-additionalScroll">Show Search Results with Additional Scroll-bar</label>
          </div>
          <div class="col col-md-6">
            <p>Enable this feature to display search results within an additional scroll-bar, allowing for easier
              navigation and organization of search results.</p>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
            <input id="toggle-stickyMobileMenu" type="checkbox" />
          </div>
          <div class="col col-md-3">
            <label for="toggle-stickyMobileMenu">Show Sticky Menu at the Bottom on Mobile</label>
          </div>
          <div class="col col-md-6">
            <p>Enable this option to display a sticky tab menu at the bottom of mobile screens for easier navigation.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col col-md-1 text-right">
          </div>
          <div class="col col-md-3">
            <label for="input-clientThemePath">Client Theme Path</label>
          </div>
          <div class="col col-md-6">
            <p>
              <input id="input-clientThemePath" type="text" name="ClientThemePath" class="form-control" />
            </p>
            <p>Please specify the custom path where the client's area theme is located. <br /><small>(Default:
                /resources/cnic/templates/cnicdomainsearch/client_theme/)</small></p>
            </p>
          </div>
        </div>
        <div class="row">
        <div class="col col-md-1 text-right">
        </div>
        <div class="col col-md-3">
          <label for="input-clientCacheTime">Search Results Cache Timeout</label>
          <span class="label label-success sitejet-badge-new sitejet-success">New</span>
        </div>
        <div class="col col-md-6">
          <p>
            <input id="input-clientCacheTime" type="number" name="ClientCacheTime" class="form-control" placeholder="Enter minutes" />
            <small class="form-text text-muted">Please enter the duration in minutes. Use -1 to disable the cache.</small>
          </p>
          <p>Specify the duration for which the search results should be cached in the session. <br /><small>(Default: 10 minutes)</small></p>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div id="tabs-2">
    <button class="btn btn-default" id="importdefaultcategories"><i class="fa fa-download"></i> Import Default
      Categories</button>
    <button class="btn btn-default" id="addcategory"><i class="fa fa-plus"></i> Add Category</button>
    <button class="btn btn-default" id="addtld"><i class="fa fa-plus"></i> Add TLD to Category</button>
    <br /><br />
    <div id="maingrid" class="grid"></div>
  </div>
</div>

<div id="dialog-confirm">
  <p id="contentholder"></p>
</div>