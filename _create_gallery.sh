#!/bin/bash

#----------------------------------------------------------------------
# CREATE GALLERY SCRIPT
#
# Script structure: we loop through the script's arguments in the "Argument Analysis"
# section and use the provided arguments to set/update various "Script-Control Variables" (SCVs)
# The SCVs are thne used in the section "Decide Script Outcome" to decide what logic
# to implement. For example, if an error occured, then we print an error message and execute the
# display_usage function to let the user know how to use the script properly. If there
# are no errors and ONE non-flag argument is provided for the gallery name, then we execute the
# main function where the major business logic of the script resides.
#----------------------------------------------------------------------

clear
echo """
=====================
CREATE GALLERY SCRIPT
=====================
"""

#############################
### Script-Control Variables
#############################
IS_QUIET_MODE=false
FLAGS_UNRECOGNIZED=""
IS_HELP_MODE=false
TOTAL_ARGS=0
GALLERY_NAME=""

#############################
### Script-Outcome Functions
#############################

display_usage() {
    echo
    echo "Script Usage:"
    echo "-h, --help   Display usage instructions"
    echo "-q, --quiet  Run in quiet mode"
    echo
}

raise_error() {
    local error_message="$@"
    echo "${error_message}" 1>&2
}

main() {
    mode="VERBOSE"
    if $IS_QUIET_MODE; then
        mode="QUIET"
    fi
    # echo "Let's create a gallery called "$GALLERY_NAME" in "$mode" mode!"
    echo
    echo "Are you sure you want to create a new gallery called '"$GALLERY_NAME"'? (Y/n)"
    echo
    read confirmCreate

    if [[ $confirmCreate =~ n|N|no|No|NO ]]; then
        echo "============================"
        echo "Cancelling gallery creation!"
        echo "============================"
        exit 0
    fi

    echo "Creating "$GALLERY_NAME
}

#############################
### Argument Analysis
#############################
for arg in "$@"; do

    # echo "PROCESSING ARGUMENT:"$arg
    case $arg in
    -h | --help)
        IS_HELP_MODE=true
        ;;
    -q | --quiet)
        IS_QUIET_MODE=true
        ;;
    -*)
        FLAGS_UNRECOGNIZED=$FLAGS_UNRECOGNIZED" "$arg
        ;;
    *)
        GALLERY_NAME=$arg
        TOTAL_ARGS=$(($TOTAL_ARGS + 1))
        ;;
    esac
done

#############################
### Decide Script Outcome
#############################

if $IS_HELP_MODE; then
    echo "MERCY IS FOR THE WEAK"
    display_usage
    exit 0
fi

if [[ ! -z $FLAGS_UNRECOGNIZED ]]; then
    raise_error "ERROR: FLAG(S) UNRECOGNIZED: "$FLAGS_UNRECOGNIZED
    display_usage
    exit 1
fi

if [[ $TOTAL_ARGS -gt 1 ]]; then
    raise_error "ERROR: ONLY ONE GALLERY NAME PERMITTED"
    display_usage
    exit 1
fi

if [[ -z $GALLERY_NAME ]]; then
    raise_error "Error: expected gallery name to be present"
    display_usage
else
    # No errors and one non-flag argument supplied
    main
fi
