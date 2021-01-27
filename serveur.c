#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/stat.h> 
#include <fcntl.h>
#include <time.h>
#include <signal.h>


void melanger(char *str,int n);
void quitter(int signum);

static char *reponse="reponse";
static char *question="question";
static int quest_fd, rep_fd;

#define DIMTAMPON 1024

int main(void)
{
  int nb_lu,i;
  char str[DIMTAMPON];
  static struct sigaction action;
  
  srand(time(NULL));
  /* Intercepter tous les signaux  */
  sigemptyset(&action.sa_mask);
  action.sa_handler=quitter;
  for(i=1;i<NSIG;i++)
    sigaction(i,&action,NULL);
  
  /* Si les fichiers existent (par quelque hasard) */
  /* on les enléve */
  unlink(question); 
  unlink(reponse);
  mkfifo(question,0622);
  chmod(question,0622);
  mkfifo(reponse,0644);
  chmod(reponse,0644);
  printf("\n"
	 "-- Démarrage du serveur [%d] :\n"
	 "     j'écoute sur le tube %s,\n"
	 "     je reponds sur le tube %s. --\n",
	 getpid(),question,reponse);
  
  quest_fd = open(question,O_RDONLY);
  rep_fd = open(reponse,O_WRONLY);
 
  for(;;)
    {
      if( (nb_lu = read(quest_fd,str,DIMTAMPON)) > 0 )
	{
	  /* On mélange n - 1 caractéres : */
	  /* on ne mélange pas la nouvelle ligne */
	  melanger(str,nb_lu-1); 
	  write(rep_fd,str,nb_lu);
	}
    }
  /* Jaimais atteint. Voir quitter */
  exit(EXIT_FAILURE);
}

void quitter(int signum)
{
  int exit_code;

  switch(signum)
    {
    case SIGINT:
      printf("-- Arrét normal du serveur --\n");
      exit_code = EXIT_SUCCESS;  
      break;
    case SIGPIPE:
      printf("-- Tube coupé : arrét exceptionnel du serveur --\n");
    default :
      exit_code = EXIT_FAILURE;
      break;
    }    
  close(quest_fd);close(rep_fd);
  unlink(question);unlink(reponse);
  exit(exit_code);
}


void melanger(char *str,int n)
{
  char c;
  int r;

  if( n <= 1 )
    return;
  
  r = rand()%n;
  c = str[0];
  str[0] = str[r];
  str[r] = c;
  melanger(str+1, n-1);
}
