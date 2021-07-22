# gdo6-tbs

Revival of the bright-shadows.net website as a gdo6 site module.

Currently this site is available under http://tbs.wechall.net
    
Please note that this site is a gdo6 demo site with custom theme, not even classic.
Some of the tests are advised to be run in a complete gdo6 test-suite.
If you want to contribute, please try to install this gdo6 driven site on your dev machine.
gdo6 is rather new, so there are a lot of bugs lurking.


## Install

To see how to setup a gdo6 site, please consult https://github.com/gizmore/gdo6/blob/master/DOCS/INSTALL.md

For CLI try this:

    git clone --recursive https://github.com/gizmore/gdo6
    cd gdo6
    ./gdoadm.sh configure
    ./gdoadm.sh provide TBS
    ./gdoadm.sh install TBS
    ./gdoadm.sh admin username password <email>
    ./gdo_yarn.sh
    ./gdo_bower.sh


### Dependencies

The following gdo6 dependencies exist and can be cloned.

    git clone --recursive https://github.com/gizmore/gdo6 # clone core
    cd gdo6/GDO # change to module directory
    # Install dependencies
    git clone --recursive https://github.com/gizmore/gdo6-session-db Session
    git clone --recursive https://github.com/gizmore/gdo6-friends Friends # for acl
    git clone --recursive https://github.com/gizmore/gdo6-contact Contact
    git clone --recursive https://github.com/gizmore/gdo6-account Account
    git clone --recursive https://github.com/gizmore/gdo6-admin Admin
    git clone --recursive https://github.com/gizmore/gdo6-vote Vote
    git clone --recursive https://github.com/gizmore/gdo6-captcha Captcha
    git clone --recursive https://github.com/gizmore/gdo6-profile Profile
    git clone --recursive https://github.com/gizmore/gdo6-pagecounter Pagecounter
    git clone --recursive https://github.com/gizmore/gdo6-online-users OnlineUsers
    git clone --recursive https://github.com/gizmore/gdo6-jquery JQuery
    git clone --recursive https://github.com/gizmore/gdo6-font-awesome FontAwesome
    git clone --recursive https://github.com/gizmore/gdo6-jquery-autocomplete JQueryAutocomplete
    git clone --recursive https://github.com/gizmore/gdo6-news News
    git clone --recursive https://github.com/gizmore/gdo6-forum Forum
    git clone --recursive https://github.com/gizmore/gdo6-comment Comment
    git clone --recursive https://github.com/gizmore/gdo6-category Category
    git clone --recursive https://github.com/gizmore/gdo6-votes Vote
    git clone --recursive https://github.com/gizmore/gdo6-mibbit Mibbit
    git clone --recursive https://github.com/gizmore/gdo6-tbs-bbmessage TBSBBMessage
    git clone --recursive https://github.com/gizmore/gdo6-tbs TBS
    git clone --recursive https://github.com/gizmore/gdo6-register Register
    git clone --recursive https://github.com/gizmore/gdo6-recovery Recovery
    git clone --recursive https://github.com/gizmore/gdo6-login Login
    git clone --recursive https://github.com/gizmore/gdo6-session-db Session
    git clone --recursive https://github.com/gizmore/gdo6-favicon Favicon
    git clone --recursive https://github.com/gizmore/gdo6-pm PM
    git clone --recursive https://github.com/gizmore/gdo6-load-on-click LoadOnClick
    git clone --recursive https://github.com/gizmore/gdo6-python Python
    git clone --recursive https://github.com/gizmore/gdo6-statistics Statistics
    
Install like any gdo6 site.

    cd gdo6
    php gdoadm.php configure # create a config to edit manually
    nano protected/config.php # make sure you use this theme: tbsbbcode,tbs,default
    php gdoadm.php install TBS # install all required modules
    php gdoadm.php admin gizmore password # create an admin
    
    
or via webserver: Goto localhost/install/wizard.php


### Crawl real TBS

To crawl TBS for INPUT/ run the following commands from the /GDO/TBS/bin/ folder. (thx Xaav)

    # todo
    

### Install crawled backup

    mkdir TBS/INPUT
    cp TBS/DUMP/TBS_public.db TBS/INPUT/TBS.db
    TBS/bin/sqlite2csv.sh

As Admin run the importer in TBS admin section.
An import will take a while. Approx. 20Min.


### Add hidden chall files

The importer merges the folders DUMP/challenges and HIDDEN/ into challenges/
If you wanna help with importing challenges you can take a look at
@TODO: Add a few demo files to DUMP/challenges/ 


#### License

This module and it's content is licensed by and dedicated to Erik and TBS(TheBlackSheep).


#### Work in Progress

Please note that this is work in progress.
