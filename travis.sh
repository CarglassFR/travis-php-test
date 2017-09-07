#!/bin/bash
set -ev

GH_SONARQ_PARAMS=""

# When run on Travis CI, env var TRAVIS_PULL_REQUEST either contains PR number (for PR builds) or "false" (for push builds).
# Locally this env var is not set. Test: if variable is not empty and is not equal "false"
echo "travis_secure_env= ${TRAVIS_SECURE_ENV_VARS}"
if [ ! -z "$TRAVIS_PULL_REQUEST" ] && [ "${TRAVIS_PULL_REQUEST}" != "false" ] && [ "${TRAVIS_SECURE_ENV_VARS}" == "true" ]; then
    echo "PR build. Will execute SonarQube preview scan"
    GH_SONARQ_PARAMS="-Dsonar.analysis.mode=preview -Dsonar.host.url=$SQ_URL -Dsonar.github.oauth=$GH_TOKEN -Dsonar.github.repository=$TRAVIS_REPO_SLUG -Dsonar.github.pullRequest=$TRAVIS_PULL_REQUEST -Dsonar.projectKey=fr.carglass.travis-test:test-php -Dsonar.projectName=Travis-Php-Test -Dsonar.projectVersion=0.1 -Dsonar.sources=src -Dsonar.language=php"
fi

# Update SonarQube data on push builds on master branch
if [ "${TRAVIS_PULL_REQUEST}" == "false" ] && [ "${TRAVIS_BRANCH}" == "develop" ] && [ "${TRAVIS_SECURE_ENV_VARS}" == "true" ]; then
    echo "Building $TRAVIS_BRANCH branch. Will execute SonarQube scan"
    GH_SONARQ_PARAMS="-Dsonar.host.url=$SQ_URL -Dsonar.projectKey=fr.carglass.travis-test:test-php -Dsonar.projectName=Travis-Php-Test -Dsonar.projectVersion=0.1 -Dsonar.sources=src -Dsonar.language=php -Dsonar.php.coverage.reportPath=coverage.xml -Dsonar.php.tests.reportPath=test_results.xml"
fi

if [ "${GH_SONARQ_PARAMS}" != "" ]; then
    echo "Executing SonarQube"
    sonar-scanner-3.0.3.778-linux/bin/sonar-scanner -X ${GH_SONARQ_PARAMS}
fi
