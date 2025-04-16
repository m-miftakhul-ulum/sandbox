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
                echo "doing delivery stuff.."
                '''
            }
        }
    }
}