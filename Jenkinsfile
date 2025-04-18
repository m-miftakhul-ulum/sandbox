pipeline {
    agent any

    environment {
        IMAGE_NAME = 'ulum75/myapp:latest'
    }

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
                sh '''
                docker build -t $IMAGE_NAME .
                '''
            }
        }
        stage('Push') {
            steps {
                echo '📦 Pushing image to Docker Hub...'
                withCredentials([usernamePassword(credentialsId: 'dockerhub-creds', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    sh '''
                    echo "$DOCKER_PASS" | docker login -u "$DOCKER_USER" --password-stdin
                    docker push $IMAGE_NAME
                    '''
                }
            }
        }
        stage('Deliver') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig', variable: 'KUBECONFIG')]) {
                    sh '''

                    kubectl apply -f deployment.yaml
                    '''
                }
            }
        }
    }
}
