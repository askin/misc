#!/bin/bash
# Simple SSL cert days-till-expiry check script
# by Askin Yollu https://blog.yollu.com askin@yollu.com
# Derived from Glen Scott, www.glenscott.net

PORT=443
if [ ${#} == 2 ]; then
    DOMAIN=$1
    PORT=$2
elif [ ${#} == 1 ]; then
    DOMAIN=$1
else
    echo "Usage: $0 example.tld [port]"
    exit 1
fi

# Check port is valid?
if ! [[ ${PORT} == +([0-9]) ]]; then
    echo "Port must be numeric!!!"
    exit 1
fi

openssl_output=$(echo "
GET / HTTP/1.0
EOT" \
    | openssl s_client -connect ${DOMAIN}:${PORT} 2>&1);

if [[ "$openssl_output" = *"-----BEGIN CERTIFICATE-----"* ]]; then
    
    cert_expiry_date=$(echo "$openssl_output" \
        | sed -n '/-----BEGIN CERTIFICATE-----/,/-----END CERTIFICATE-----/p' \
        | openssl x509 -enddate \
        | awk -F= ' /notAfter/ { printf("%s\n",$NF); } ');
    
    seconds_until_expiry=$(echo "$(date --date="$cert_expiry_date" +%s) - $(date +%s)" |bc);
    days_until_expiry=$(echo "$seconds_until_expiry/(60*60*24)" |bc);
    
    echo "$days_until_expiry";
else
    echo "NOT_FOUND";
fi
exit 1
