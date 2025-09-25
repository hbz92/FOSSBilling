<?php

$keys = [];
$langs = glob(__DIR__ . '/*.php', GLOB_BRACE);
if ($langs === false) {
    echo "Error: Unable to read language files.\n";
    exit(1);
}

// Filter out the current file
$langs = array_filter($langs, function ($file) {
    return basename($file) !== "validateLangs.php";
});

// Check if any language files were found
if (empty($langs)) {
    echo "Error: No language files found.\n";
    exit(1);
}

// Load the language files
foreach ($langs as $langfile) {
    $_LANG = [];
    include $langfile;
    $lang = preg_replace("/\..+$/", "", basename($langfile));
    $keys[$lang] = array_keys($_LANG);
}

// Find keys that are in english.php but not in other lang files
foreach ($keys as $lang => $langKeys) {
    if ($lang === 'english') {
        continue;
    }
    $missingKeys = array_diff($keys['english'], $langKeys);
    if (empty($missingKeys)) {
        echo "All keys in english.php are present in $lang.php.\n";
        continue;
    }

    echo "----------------------------------------------------------\n";
    echo "| Keys in english.php that are not present in $lang.php |\n";
    echo "----------------------------------------------------------\n";
    echo implode(", ", $missingKeys);
    exit(1);
}

exit(0);
