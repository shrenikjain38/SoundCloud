#include <signal.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/time.h>
#include <sys/resource.h>
#include <errno.h>

#define MS 1000000
#define abs(x) ( x<0 ? -(x) : x)

volatile pid_t pid1;
volatile sig_atomic_t keepRunning = 1;

void intHandler(int sig) {
    keepRunning = 0;
    // if(pid1 > 0 && kill(pid1, SIGTERM) == -1)
    //     perror("Sigterm");
}

int 
main(int argc, char *argv[]){
    signal(SIGINT, intHandler);
    if(argc > 1){
        struct rusage usage;
        struct timeval t1,t2;
        struct timezone tz;
        double time_taken = 0.0,start_time = 0.0;
        pid_t pid;
        int status;
        pid = fork();
        pid1 = pid;

        gettimeofday(&t1,&tz);
        // start_time = t.tv_sec + t.tv_usec/MS;
        if(pid == -1){
            printf("Unable to start process\n");
            exit(1);
        }
        else if(pid == 0){
            execvp(argv[1], &argv[1]);
        }
        else if(pid > 0){
            waitpid(pid, &status, WUNTRACED);

            gettimeofday(&t2,&tz);
            getrusage(RUSAGE_CHILDREN, &usage);
            // time_taken = t.tv_sec + t.tv_usec/MS - start_time;
            printf("\nreal   %dm%d.%03ds\n", (t2.tv_sec - t1.tv_sec)/60,(t2.tv_sec - t1.tv_sec)%60,abs(t2.tv_usec - t1.tv_usec)/1000);
            printf("user   %dm%d.%03ds\n", usage.ru_utime.tv_sec/60, usage.ru_utime.tv_sec%60, usage.ru_utime.tv_usec/1000);
            printf("system %dm%d.%03ds\n", usage.ru_stime.tv_sec/60, usage.ru_stime.tv_sec%60, usage.ru_stime.tv_usec/1000);
        }
    }
    else{
        printf("\nreal   0m0.000s\n");
        printf("user   0m0.000s\n");
        printf("system 0m0.000s\n");
    }
    return 0;
}
