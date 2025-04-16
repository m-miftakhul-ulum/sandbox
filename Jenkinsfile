pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo "Building.."
                sh '''
                docker build -t myapp .
                '''
            }
        }
        stage('Test') {
            steps {
                echo "Testing.."
                sh '''
                echo "doing test stuff.."
                '''
            }
        }
        stage('Deliver') {
            steps {
                echo 'Deliver....'
                sh '''
                kubectl set image deployment/frankenphp-deployment frankenphp=$DOCKER_IMAGE --namespace=default || \
                kubectl apply -f deployment.yaml
                '''
            }
        }
    }
}