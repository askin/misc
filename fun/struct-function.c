#include <stdio.h>

/*
 * Sinifimizi yaratiyoruz
 */
struct _myobject {
  // alt alanlar
  int a, b;
  /*
   * Metod
   * Burada fonksiyon pointeri tanimliyoruz
   */
  int (*add)(struct _myobject*);
};

// struct on ekinden kurtuluyoruz
typedef struct _myobject MyObject;

/*
 * Asil isi yapacak fonksiyonu tanimliyoruz
 * MyObject structini parametre olarak aliyor
 */
int realAdd(MyObject* a) {
  return a->a + a->b;
}

int main ( void ) {
  /*
   * Nesnemizi olusturuyoruz.
   * add pointerina fonksiyonu atiyoruz
   */
  MyObject mo = {1, 2, realAdd};
  printf("A + B = %d\n", mo.add(&mo));
  return 0;
}
