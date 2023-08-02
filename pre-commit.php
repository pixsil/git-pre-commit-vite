<?php

$do_compile = false;

$line_arr = file('public/build/manifest.json');
// $line_arr = explode("\n", $file);


// for all resource files
foreach ($line_arr as $line) {
    if (!str_starts_with($line, '    "src": ')) {
        continue;
    }

    $line_clean = substr($line, 12, -2);

    $output_git_status = shell_exec('git status --short | grep "M  '. $line_clean .'"');

    if ($output_git_status) {
        #$changed_files_arr[] = substr($output_git_status, 3, -1);

        $do_compile = true;
    }
}


if ($do_compile === true) {
    echo "running npm run build";

    shell_exec('PATH=$PATH:/usr/local/bin:/usr/local/sbin:/usr/local/bin/npm; npm run build');
    
    shell_exec('git add -f public/build');
}

// if we have one file added to the git commit, then build and add the whole build folder, to keep it simple
// you can change it to only files in the manifest, or even only modified, feel free to do yourself, first setup is commented out
// foreach ($line_arr as $line) {
//     if (!str_starts_with($line, '    "file": ')) {
//         continue;
//     }
//
//     $line_clean = 'public/build/'. substr($line, 13, -3);
//
//     $added_git_file = shell_exec('git add -f "'. $line_clean .'"');
//
//     if ($added_git_file) {
//
//         echo "Added file: $added_git_file";
//     }
// }





// foreach ($changed_files_arr as $file) {
//     echo "add $file to git";
//
//     $output_git_add[] = shell_exec('git add '. $file .'"');
// }
