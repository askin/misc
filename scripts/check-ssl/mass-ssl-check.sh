#!/bin/bash
# by Askin Yollu https://blog.yollu.com askin@yollu.com

CHECK_SCRIPT=sslcheck-expiry.sh

# Content:
# example1.tld 443
# example2.tld
# ...
DOMAIN_LIST=${1}
TRASHOLD=15
CRITICAL=7

while read line; do
    remaing_days=$(${CHECK_SCRIPT} ${line})
    if [ "${remaing_days}" == "NOT_FOUND" ]; then
        echo "Domain: ${line} is not found!!!"
    elif [ ${remaing_days} -lt ${CRITICAL} ]; then
        echo "Domain: ${line} is CRITICALL!!!, RENEW CERTIFICATE!!!"
    elif [ ${remaing_days} -lt ${TRASHOLD} ]; then
        echo "Domain: ${line} is about expire. Be carefull!"
    fi
done < ${DOMAIN_LIST}
