<?php include("../../../template.php");

  AddHeader(3, "Snake Game", "C, programming, games, snake, c games, frame buffer");

  AddBody(2, 1, 3);

?>

<h2> Snake Game </h2>

<div class="PostDataPlain">

<h4> Tick... Tick... Tick... the snake moves in steps </h4>
<span class="firstWord">S</span>nake game, a popular entry level video-game where the objective is to navigate a
complicate maze while collecting for food and avoid obstacles. Every time you collect a food the snake grows in
length and after every level it's speed increases along with the complexity of the maze. Seems simpe right... that's
the reason i decides to code this game in pure 'c' programming in the console mode. No graphics drivers and nothing
fancy. Just a text base snake game in c, which emphasizes the logic of the game rather than the astheitics. Turns out
it is a very simple logic actually to build a maze and control the snake around. <br /><br />

<span class="firstWord">T</span>he whole game takes place in a character buffer which also acts as the frame buffer.
The character '*' stands for the snake, '$' for the food source, '>' for obstacle and '|' '_' for boundries. The controls
are via the navigation keys in the keyboard and which every input the contents of the buffer are re-arranged and checked
for various events such as eating and growing, carshing and dying or end of a level. This simple logic is repeated in a
speed that is depended on the current level. Every new level is created by randonly placing the various elements in the buffer.

<br /></div><br />

<div class="Code">

<pre id="CodeBlock">

#include &ltstdio.h&gt
#include &ltdos.h&gt
#include &ltstring.h&gt
#include &ltconio.h&gt
#include &ltmath.h&gt
#include &ltwindows.h&gt

/* Various key codes */
#define x_co 0  /* x co-ordinate */
#define y_co 1  /* y co-ordinate */
#define r_h 77  /* right key */
#define l_h 75  /* left  key */
#define d_h 80  /* down  key */
#define u_h 72  /* up    key */

int initialize (void);
char frame[22][42];  /* Frame buffer */

void main()
{
  int c,head=r_h,level=1;
  int st[2],end[2],count,i,j;

  strcpy_s(&frame[0][0],42,"-----------------------------------------");
  strcpy_s(&frame[21][0],42,"-----------------------------------------");

  /************************************************/

  /******** LINE PREPARATIONS ********/
stat:
  fflush(stdin);

  if(level++==5)
  {
    printf("You win");
    goto ennd;
  }

  count=initialize(); /* returns how many food available */
  head=r_h;
  st[0]=3,st[1]=1,end[0]=1,end[1]=1;

  /* Start when user presses any key */
  while(_kbhit())
  {
    c = _getch();
  }
  /************************************************/

  /******** MAIN LOOP START *******/
start:
  Sleep(500-(level*100));    /* Spped of play or frame speed */

  /******** Writing one frame ******/
  system("cls");

  for(i=0;i&lt22;printf("\n"),i++)
  {
    for(j=0;j&lt42;j++)
    {
      if((frame[i][j] == r_h) ||
         (frame[i][j] == l_h) ||
         (frame[i][j] == d_h) ||
         (frame[i][j] == u_h))
      {
        printf("%c",'*');
      }
      else
      {
        printf("%c",frame[i][j]);
      }
    }
  }
  /************************************************/

  /******** INSERTING A CHAR @ START *****/

  if(_kbhit())    /* CHECKING FOR A ENTRY */
  {
    c = _getch();

    if((c == r_h) || (c==l_h) || (c == u_h) || (c == d_h))
    {
      if(!(((head == r_h) && (c == l_h)) ||
           ((head == l_h) && (c == r_h)) ||
           ((head == d_h) && (c == u_h)) ||
           ((head == u_h) && (c==d_h))))
      {
        head = c;
        frame[st[y_co]][st[x_co]] = head;
      }
    }
  }

  next:
  st[x_co] += ((head==r_h)?(1):(0));
  st[x_co] -= ((head==l_h)?(1):(0));
  st[y_co] += ((head==d_h)?(1):(0));
  st[y_co] -= ((head==u_h)?(1):(0));

  c = frame[st[y_co]][st[x_co]];
  frame[st[y_co]][st[x_co]] = head;
  /************************************************/


  /****** CHECKING FOR VARIOUS ENDS ******/

  if(c)         /* NULL OR WHAT */
  {
    if(c=='$')    /* IS THAT A FOOD */
    {
      if(!(--count))        /* FOOD TAKEN */
      {
        printf("\nYou Won next level(y/n)");

        if(_getch()=='y')
        {
          goto stat;                      /* NEXT LEVEL */
        }
        else
        {
          goto ennd;                      /* BYE BYE  */
        }
      }
      goto next;                      /* GROWS BIGGER  */
    }
    else
    goto end;                       /* LOSSER  */
  }

  /************************************************/



  /******** ELIMINATING @ REAR   ******/
  c = frame[end[y_co]][end[x_co]];
  frame[end[y_co]][end[x_co]] = '\0';

  end[x_co] += ((c==r_h)?(1):(0));
  end[x_co] -= ((c==l_h)?(1):(0));
  end[y_co] += ((c==d_h)?(1):(0));
  end[y_co] -= ((c==u_h)?(1):(0));

  goto start;
  /************************************************/

end:
  printf("You Lose");

ennd:
  Sleep(3000);
  _getch();
}

/* Initialize a level with obstacles and food */
int initialize(void)
{
  int i,j,a=10;

  for(i=1;i&lt21;i++)
  {
    for(j=0;j&lt42;j++)
    {
      if((!j) || (j == 41))
      {
        frame[i][j]='|';
      }
      else
      {
        frame[i][j]=(((rand()%100)==a*7-5)&&(a)&&(i-1))?a--,'$':(rand()%1000>990)?'>':'\0';
        frame[1][1]=r_h;
        frame[1][2]=r_h;
        frame[1][3]=r_h;
      }
    }
  }

  return (10-a);
}

</pre></div>

<h3>Output</h3> <div style="margin: 6px;"> <img style="width: 99%;" src="snake.jpg" alt="Snake Game Output" /> </div>  <br />
                <div style="margin: 6px;"> <img style="width: 99%;" src="snake1.jpg" alt="Snake Game Output" /> </div>  <br />
                <div style="margin: 6px;"> <img style="width: 99%;" src="snake2.jpg" alt="Snake Game Output" /> </div>  <br />

<?php

  AddFooter(2, 1, 3);

?>
