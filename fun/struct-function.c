#include <stdio.h>
#include <stdlib.h>

/*
 * Sinifimizi yaratiyoruz
 */
struct _myobject {
    // attributes
    int a, b;
    /*
     * Methed
     * Fonction pointer
     */
    int (*add)(struct _myobject*);
};

// get out struct prefix
typedef struct _myobject MyObject;

/*
 * Define Method
 * Get MyObject struct as a parameter
 */
int realAdd(MyObject* a) {
  return a->a + a->b;
}

// Constructer
MyObject* InitMyObject(int a, int b) {
    MyObject* obj = malloc(sizeof(MyObject));
    if(obj == NULL) {
        return NULL;
    } else {
        obj->a   = a;
        obj->b   = b;
        obj->add = realAdd;
    }
}

int main ( void ) {
    /*
     * Create Object
     */
    MyObject* mo = InitMyObject(1, 2);
    printf("A + B = %d\n", mo->add(mo));
    return 0;
}
