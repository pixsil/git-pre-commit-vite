# Build Vite application automatically by commit

This is the Vite version for build your vite automatically by commiting your code to the repo.

For the old webpack / mix version:
[https://github.com/pixsil/git-pre-commit-vite](https://github.com/pixsil/pix_git_precom)

Made to work on MacOS. Other then the previous version, that was build bash, this version is using commandline PHP. Which should be installed.

## Features

* Runs automatically by a commit
* It builds the project and add the build files to the commit
* Only build if needed, based if source assets are added to the commit
* No need to remove the build folder from the .gitignore, it forces the files to the repo

## Donate

Find this project useful? You can support me with a Paypal donation:

[Make Paypal Donation](https://www.paypal.com/donate/?hosted_button_id=2XCS6R3CTC5BA)

## Installation

Place the both files in your hooks dir inside the .git directory. That's all!

Quick install from root folder project:
```
mkdir -p .git/hooks
&& wget -O .git/hooks/pre-commit https://raw.githubusercontent.com/pixsil/git-pre-commit-vite/main/pre-commit
&& wget -O .git/hooks/pre-commit.php https://raw.githubusercontent.com/pixsil/git-pre-commit-vite/main/pre-commit.php
&& chmod +x .git/hooks/pre-commit
&& chmod +x .git/hooks/pre-commit.php
```
