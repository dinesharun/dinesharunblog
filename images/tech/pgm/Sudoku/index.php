<?php include("../../../template.php");

  AddHeader(3, "SU-DO-KU Solver", "C, programming, games, su-do-ku, c games, back tracking");

  AddBody(2, 1, 4);

?>

<h2> SU-DO-KU Solver </h2>

<div class="PostDataPlain">

<h4> Is it 3, or may be 7 could aslo be 9... </h4>
<span class="firstWord">P</span>artially filled rows and columns are your only clues. A fully filled matrix is you target.
Pencil and eraser are your tools. The task which takes humans hours and even days to complete is now can be solved within
seconds. Yes a SU-DO-KU solver. There are more efficient solvers based on set theory then this program, but this program is
a direct approach of human solving which uses gusses and back-tracking when hit with dead-ends. But with the processing power of
today's computers this finishes in a flash. Also it is humble enough to admit it's <a class="InTextLink" href="#defeat"> defeats </a>.

<br /></div><br />

<div class="Code">

<pre id="CodeBlock">

/****************
           PROGRAM FOR SOLVING A GIVEN SU-DO-KU
                            *******************/

/************************ Documentation *******************************/
//  Written by        :: K.Dinesh arun.
//  Compiled & Tested :: Windows XP (service pack 2)/ Borland Turbo C++ 3.0.
/**********************************************************************/

/********************** Library files *****************/
#include &ltstdio.h&gt
#include &ltconio.h&gt
#include &ltstdlib.h&gt
#include &ltstring.h&gt
#include &ltfcntl.h&gt

/****************************************************/

/******** Global variables ******* */
int a[9][9],pr[9][9][9],nu=0;
/***********************************/

/******** Dynamic memory for stack ADT ***********/
struct node;
typedef struct node * ptrtonode;
typedef ptrtonode pos,temp;
pos top=NULL;
struct node
{
  int aa[9][9];
  pos next;
};
/*****************************************************/

/****************Sub function definitions*************/
void solve();
void push(int x,int y,int z);
void correct_assumption();
void make_empty(int x,int y);
void isnull(int x);
int mpr();
int mpr1(int x,int y);
int is_complete();
int fstore(int x);
void ashow();
void show();
void sshow();
/*****************************************************/

/*************** Main function ***********************/
void main()
{
  int i,j;
  system("cls");
  printf("\n\n__________SU | DO | KU____________\n");
  for(i=0;i<9;i++)               /*get the input data*/
  {
    printf("%d row: ",(i+1));
    for(j=0;j<9;j++)
    scanf_s("%d",&a[i][j]);
  }
  solve();      /* solve the problem */
  ashow();      /* display the result */
  _getch();
}
/***************************************************************/

/***************** Main driver for solving the problem **********/
void solve()
{
  int s,x=0,y=0;
  y=mpr();
  if(y!=0)
  {
    correct_assumption();
    solve();
  }
  x=fstore(0);
  if(x==0)
  x=fstore(1);
  if(x==0)
  {
    printf("\n\n\nThe problem is beyond the programs scope");
    _getch();
    exit(0);
  }
  s=is_complete();
  if(s!=0)
    solve();
  else
  {
    ashow();
    _getch();
    exit(0);
  }
}
/**************************************************************/

/**************************************************************/
int mpr()
{
  int x,y,z;
  for(x=0;x<9;x++)
  for(y=0;y<9;y++)
  {
    z=mpr1(x,y);
    if(z!=0)
    return 1;
  }
  return 0;
}
/*********************************************************/

/**********************************************************/
int mpr1(int x,int y)
{
  int i,j,k,z=-1;
  if(a[x][y]!=0)
  {
    make_empty(x,y);
    return 0;
  }
  for(i=1;i<=9;i++)
  {
    for(j=0;j<9;j++)
      if(a[x][j]==i)
        goto next;
      for(j=0;j<9;j++)
        if(a[j][y]==i)
          goto next;
      for(j=((x/3)*3);j<(((x/3)*3)+3);j++)
        for(k=((y/3)*3);k<(((y/3)*3)+3);k++)
           if(a[j][k]==i)
             goto next;
           pr[x][y][++z]=i;
           next: {}
  }
  if(z==-1)
    return 1;
  else
  {
    for(;z<9;)
      pr[x][y][++z]=0;
  }
  return 0;
}
/***************************************************************/

/*************** makes the probabilites empty for *******
       ************  occupied spaces ***************************/
void make_empty(int x,int y)
{
  int j;
  for(j=0;j<9;j++)
    pr[x][y][j]=0;
}
/*************************************************************/

/*************************************************************/
int fstore(int q)
{
  int i,j,k,x=0,z=0;
  for(i=0;i<9;i++)
   for(j=0;j<9;j++)
   {
     for(k=0,z=0;k<9;k++)
       if(pr[i][j][k]!=0)
         z++;
       if((z==1)&&(q==0))
       {
         a[i][j]=pr[i][j][0];
         x++;
         return x;
       }
       if((z==2)&&(q!=0))
       {
         a[i][j]=pr[i][j][0];
         push(i,j,(pr[i][j][1]));
         return 5;
       }
  }
  return x;
}
/****************************************************************/

/***************************************************************/
void push(int x,int y,int z)
{
  int i,j;
  temp t;
  t=malloc(sizeof(struct node));
  for(i=0;i<9;i++)
    for(j=0;j<9;j++)
      t->aa[i][j]=(((i==x)&&(j==y))?z:(a[i][j]));
    if(top==NULL)
    {
      top=t;
      top->next=NULL;
    }
    else
    {
      t->next=top;
      top=t;
    }
    nu++;
}
/***************************************************************/

/**************************************************************/
void correct_assumption()
{
  int i,j;
  temp t=top;
  if(top==NULL)
  {
    printf("Unexpected Error Sorry for inconvinence");
    _getch();
    exit(0);
  }
  for(i=0;i<9;i++)
  for(j=0;j<9;j++)
  a[i][j]=t->aa[i][j];
  top=top->next;
  free(t);
  nu--;
}
/*********************************************************/

/*********** Checks for the end of the program **********/
int is_complete()
{
  int i,j,k=0;
  for(i=0;i<9;i++)
    for(j=0;j<9;j++)
      if(a[i][j]==0)
        k=1;
  return k;
}
/**********************************************************/

/************* prints the probability for every empty space *********/
void show()
{
  int i,j,k;
  for(i=0;i<9;i++)
   for(j=0;j<9;j++)
   {
     for(k=0;k<9;k++)
       printf("%d ",pr[i][j][k]);
     printf("\n");
   }
}
/*****************************************************************/

/*************** Prints the result in the normal form ************/
void ashow()
{
  int i,j;
  printf("\n\n\t\tThe solution for the given SU DO KU is:\n\n");
  printf("\n\t  ");
  for(i=0;i<9;i++)
  {
    for(j=0;j<9;j++)
      printf(" %d ",a[i][j]);
    printf("\n\t  ");
  }
}
/******************************************************************/

/************* Prints the contents of the stack *****************/
void sshow()
{
  int i,j;
  temp t;
  printf("\nstack\n");
  for (t=top;t!=NULL;t=t->next)
  {
    for(i=0;i<9;i++)
    {
      for(j=0;j<9;j++)
        printf ("%d ",t->aa[i][j]);
      printf("\n");
    }
    _getch();
    printf("\n");
  }
}
/******************************************************************/

</pre></div>

<h3>Output</h3> <div style="margin: 6px;"> <img style="width: 99%;" src="sudoku.jpg" alt="SU-DO-KU Solver Output" /> </div>  <br />
                <div style="margin: 6px;"> <img style="width: 99%;" src="sudoku1.jpg" alt="SU-DO-KU Solver Output" /> </div>  <br />
                <a href="" name="defeat"></a>
                <div style="margin: 6px;"> <img style="width: 99%;" src="sudoku2.jpg" alt="SU-DO-KU Solver Output" /> </div>  <br />

<?php

  AddFooter(2, 1, 3);

?>