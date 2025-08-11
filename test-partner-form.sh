#!/bin/bash

echo "Testing Partner Program Form Submission..."

# Get CSRF token first
RESPONSE=$(curl -s http://localhost:8080/partner-program)
CSRF_TOKEN=$(echo "$RESPONSE" | grep -oP 'name="csrf_test_name"\s+value="\K[^"]+' | head -1)

if [ -z "$CSRF_TOKEN" ]; then
    echo "Warning: No CSRF token found"
fi

echo "CSRF Token: ${CSRF_TOKEN:0:20}..."

# Submit form with test data
FORM_DATA="businessName=Test+Company+LLC&\
registrationNumber=REG123456&\
countryBusiness=South+Africa&\
contactName=John+Doe&\
contactEmail=test@example.com&\
contactPhone=%2B27123456789&\
Skype_Teams=john.doe&\
question1=1-5+Million&\
question2=Yes&\
question3=Technology&\
question4=Reseller&\
solutions%5B%5D=NU+SIP&\
solutions%5B%5D=NU+CRON&\
question6=We+plan+to+market+through+digital+channels+and+online+advertising&\
question7=Our+target+market+is+SMB+companies+in+South+Africa&\
form_start_time=$(($(date +%s) - 10))&\
form_token=test_token_$(date +%s)"

if [ ! -z "$CSRF_TOKEN" ]; then
    FORM_DATA="${FORM_DATA}&csrf_test_name=${CSRF_TOKEN}"
fi

echo "Submitting form..."
RESULT=$(curl -s -L -X POST \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
  -d "$FORM_DATA" \
  http://localhost:8080/submit_partner_form 2>&1)

# Check response
if echo "$RESULT" | grep -q '"status":"success"'; then
    echo "✅ SUCCESS: Partner form submission successful!"
    REFERENCE=$(echo "$RESULT" | grep -oP '"reference":"\K[^"]+')
    echo "Reference Number: $REFERENCE"
elif echo "$RESULT" | grep -q '"status":"error"'; then
    echo "❌ ERROR: Partner form submission failed"
    ERROR_MSG=$(echo "$RESULT" | grep -oP '"message":"\K[^"]+')
    echo "Error Message: $ERROR_MSG"
    echo "Full Response: $RESULT"
else
    echo "❓ UNKNOWN: Unexpected response"
    echo "Response: ${RESULT:0:500}"
fi