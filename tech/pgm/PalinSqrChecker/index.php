<?php include("../../../template.php");

  AddHeader(3, "Technology - Programming", "Blog, Photography, Blender, Nature, Landscape, Electronics, Animation");

  AddBody(2, 1, 2);

?>



<h2> Palindromic Palindrome Checker </h2>

<div class="PostDataPlain">

  <h4> A Palindromic code that likes palindromes... </h4>

  <span class="firstWord">P</span>alindromes are fascinating objects... some occur naturally and others are created by humans
  accidently or for specific artisitic purposes. The following progrram is such an artisitic creation whose purpose is also
  ironiocally similar to it's structure. Yes it is a palindromic c program which checkes if the given strings are plaindrome or
  not. Palindrome checkers are simple programms usualy given to entry level programmers or students as exercise. But as you have
  gussed this program is no that simple. It cleverly disguises the cheking logic within it's symmetrical lines. The program is
  a line palindrome, where the center is at line 26 and line 25 is exactly same as line 27, line 24 is exactly same as line 28 and
  so on....

  </div>

  <br /><div class="Code">

  <pre id="CodeBlock">

  #define D */
  /*
  }
  goto iteration;
  c = getch();
  */

  #include &ltstdio.h&gt
  #include &ltconio.h&gt
  #include &ltstdlib.h&gt

  void main(void)
  {
    char nan[42];
    char a,b,c;
    int  i,j,p,ln;
    c = 'y';
    iteration:
    /*
    #define I */
    #define N 42

    i=43,j=0,p=316,ln=0;
    printf("%s",((p==316)?("\\nEnter the String to be checked\\t"):((p==0)?("Ha! the string is a palindrome\\n Next Try ? y/n\\t"):("Ahhh! the string is not a palindrome\\n Next Try ? y/n\\t"))));
    p += ((p==316)?(((c==\'y\')||(c==\'Y\'))?(scanf("%s",nan)):(exit(0))):(p));
    for(ln=N-i+1,i=0,j=ln,p=(((N-ln)/2)+((N-ln)%2)+1),a=b=1;(((ln==0)&&(a!=0)&&(i&ltN))||((ln!=0)&&(a==b)&&((i-1)&lt=(N-j))));a=nan[i++],b=nan[N-1-j++],p--);
    /* Right here is the center of the palindromic code Upper part will be repeated here after - Nicole Kidman */
    for(ln=N-i+1,i=0,j=ln,p=(((N-ln)/2)+((N-ln)%2)+1),a=b=1;(((ln==0)&&(a!=0)&&(i&ltN))||((ln!=0)&&(a==b)&&((i-1)&lt=(N-j))));a=nan[i++],b=nan[N-1-j++],p--);
    p += ((p==316)?(((c==\'y\')||(c==\'Y\'))?(scanf("%s",nan)):(exit(0))):(p));
    printf("%s",((p==316)?("\\nEnter the String to be checked\\t"):((p==0)?("Ha! the string is a palindrome\\n Next Try ? y/n\\t"):("Ahhh! the string is not a palindrome\\n Next Try ? y/n\\t"))));
    i=43,j=0,p=316,ln=0;

    #define N 42
    #define I */
    /*
    iteration:
    c = 'y';
    int  i,j,p,ln;
    char a,b;
    char nan[42];
    {
    void main(void)

    #include &ltstdlib.h&gt
    #include &ltconio.h&gt
    #include &ltstdio.h&gt

    */
    c = getch();
    goto iteration;
    }
    /*
    #define D */

    </pre> </div>
    <br /> <br />

    <h3>Output</h3>

    <div style="margin: 6px;"> <img style="width: 99%;" src="palindrome.jpg" alt="Palindromic Palindrome Checker" /> </div>

<?php

  AddFooter(2, 1, 2);

?>
