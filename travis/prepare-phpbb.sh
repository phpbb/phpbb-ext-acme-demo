#!/bin/bash
#
# @copyright (c) 2014 phpBB Group
# @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
#
set -e
set -x

EXTNAME=$1
BRANCH=$2
EXTPATH_TEMP=$3

# Copy extension to a temp folder
mkdir ../../tmp
cp -R . ../../tmp
cd ../../

# Clone phpBB
git clone --depth=1 "git://github.com/nickvergessen/phpbb.git" "phpBB3" --branch=$BRANCH
