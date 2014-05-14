<?php include("../../../template.php");

  AddHeader(3, "Print Thy Self", "C, programming, obsculation, print thy self, self replication");

  AddBody(2, 1, 1);

?>

<h2> Print Thy Self! </h2>

<div class="PostDataPlain">

<h4> Oh! my source code, I order you to Print Thy Self... </h4>
<span class="firstWord">A</span>nd magically that happens... yes the program reveals it's secrets
and prints the exact copy of it's c source code. I had an idea to develop some self replication code
that can output exactly the source that enables it to output that exact source. A visious recursive logic.
It seems impossible at first since any program that prints something must be larger than what it prints.
But the answer lies in the knowledge of arrays and loops in the programming language. The arrays P, P1, P2
hold the same content in ASCII and the inner for loop make sure to print once the arrays and the next time the
contents in the arrays. There is not only logic in the source code, Also there is a comment describing the working
of the code. You can find the code and it's exact output below...

<br /></div><br />

<div class="Code">

<pre id="CodeBlock">

#include &ltstdio.h&gt
#include &ltconio.h&gt
/*
.It\'s a simple pgm
.But Not simple
.Prints it\'s source
*/
void main()
{
int i;
char P[38] = {32,
32,32,112,114,
105,110,116,102,40,
34,37,115,37,115,37,
115,37,115,34,44,
40,33,105,41,63,34,
34,58,80,44,34,0};
char P1[24] =
{34,44,40,40,105,61,61,
48,41,63,34,34,58,80,
49,41,44,34,92,110,34,
41,59,0};
char P2[54] =
{44,40,105,61,61,48,41,
63,34,34,58,80,50,44,40,
40,105,61,61,48,41,63,
34,34,58,34,92,110,32,
32,125,92,110,32,32,103,
101,116,99,104,40,41,59,
92,110,125,34,41,44,34,
34,41,59,0};
 for(i=0;i<2;i++)
 {
   printf("%s%s%s%s",(!i)?"":P,"#include <stdio.h>",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"#include <conio.h>",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"/*",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,".It\'s a simple pgm",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,".But Not simple",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,".Prints it\'s source",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"*/",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"void main()",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"{",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"int i;",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"char P[38] = {32,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"32,32,112,114,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"105,110,116,102,40,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"34,37,115,37,115,37,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"115,37,115,34,44,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"40,33,105,41,63,34,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"34,58,80,44,34,0};",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"char P1[24] = ",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"{34,44,40,40,105,61,61,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"48,41,63,34,34,58,80,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"49,41,44,34,92,110,34,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"41,59,0};",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"char P2[54] = ",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"{44,40,105,61,61,48,41,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"63,34,34,58,80,50,44,40,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"40,105,61,61,48,41,63,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"34,34,58,34,92,110,32,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"32,125,92,110,32,32,103,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"101,116,99,104,40,41,59,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"92,110,125,34,41,44,34,",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,"34,41,59,0};",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P," for(i=0;i<2;i++)",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P," {",((i==0)?"":P1),"\\n");
   printf("%s%s%s%s",(!i)?"":P,((i==0)?"":P2),((i==0)?"":"\\n }\\n  getch();\\n}"),"");
 }

 getch();
}

</pre></div>

<h3>Output</h3> <div style="margin: 6px;"> <img style="width: 99%;" src="print_thy_self.jpg" alt="Print Thy Self Output" /> </div>  <br />

<?php

  AddFooter(2, 1, 1);

?>
